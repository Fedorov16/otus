<?php

namespace App\Controller\Api\v1;

use App\DTO\UserDTO;
use App\Entity\User;
use App\Form\UserCreateForm;
use App\Form\UserUpdateForm;
use App\Service\UserService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Twig\Environment;

/** @Route("/api/v1/user") */
class UserController extends AbstractController
{
    /**
     * @var UserService
     */
    private UserService $userService;
    /**
     * @var Environment
     */
    private Environment $twig;

    public function __construct(UserService $userService, Environment $twig)
    {
        $this->userService = $userService;
        $this->twig = $twig;
    }

    /**
     * @Route("", methods={"GET"})
     * @param Request $request
     * @return Response
     */
    public function getUsersAction(Request $request): Response
    {
        $perPage = $request->query->get('perPage');
        $page = $request->query->get('page');
        $users = $this->userService->getAllUsers($page ?? 0, $perPage ?? 20);

        $code = empty($users) ? 204 : 200;

        return new JsonResponse(['users' => array_map(static fn(User $user) => $user->toArray(), $users)], $code);
    }

    /**
     * @Route("/form/create", methods={"GET"})
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function getCreateFormUsersAction(): Response
    {
        $form = $this->createForm(UserCreateForm::class);
        return new Response($this->twig->render("user/userCreateForm.html.twig", [
            'form' => $form->createView(),
        ]));
    }

    /**
     * @Route("/form/create", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function createFormUsersAction(Request $request): Response
    {
        $form = $this->createForm(UserCreateForm::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $UserData = $form->getData();
            $userDTO = new UserDTO($UserData);
            $userId = $this->userService->saveUser($userDTO);
            return new Response($userId);
        }
        return new Response('Something went wrong');
    }

    /**
     * @Route("/form/update/{id}", methods={"GET"}, requirements={"id":"\d+"})
     * @param int $id
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function getUpdateFormUsersAction(int $id): Response
    {
        $userData = $this->userService->getUserData($id);
        if (empty($userData)) {
            return new Response('user Not found');
        }
        $form = $this->createForm(UserUpdateForm::class, '', $userData);
        $content = $this->twig->render("user/userUpdateForm.html.twig", [
            'form' => $form->createView(),
        ]);

        return new Response($content);
    }

    /**
     * @Route("/form/update/{id}", methods={"POST"}, requirements={"id":"\d+"})
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function updateFormUsersAction(Request $request, int $id): Response
    {
        $form = $this->createForm(UserUpdateForm::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $userName = $form['name']->getData();
            $userEmail = $form['email']->getData();
            $departmentName = $form['department']->getData();
            $response = $this->userService->updateUserById($id, $userName, $userEmail, $departmentName);
        }
        return new Response($response);
    }

    /**
     * @Route("", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function saveUserAction(Request $request): Response
    {
        $userDTO = new UserDTO([
            'name' => $request->request->get('name'),
            'email' => $request->request->get('email'),
            'password' => $request->request->get('password'),
            'department' => $request->request->get('department'),
        ]);

        if ($this->userService->isUserExistByEmail($userDTO->getEmail())) {
            return new JsonResponse(['success' => false, 'email ' . strtolower($userDTO->getEmail()) . ' is already exist'], 400);
        }

        if (!$this->userService->getDepartmentByName($userDTO->getDepartmentName())) {
            return new JsonResponse(['success' => false, 'department ' . $userDTO->getDepartmentName() . ' doesn\'t exist'], 400);
        }

        $userId = $this->userService->saveUser($userDTO);
        [$data, $code] = $userId === null ?
            [['success' => false], 400] :
            [['success' => true, 'userId' => $userId], 200];

        return new JsonResponse($data, $code);
    }

    /**
     * @Route("", methods={"PATCH"})
     * @param Request $request
     * @return Response
     */
    public function updateUserAction(Request $request): Response
    {
        $userId = $request->query->get('userId');
        $userName = $request->query->get('name');
        $userEmail = $request->query->get('email');
        $userDepartment = $request->query->get('department');
        if (!isset($userId, $userName, $userEmail, $userDepartment)) {
            return new JsonResponse(['success' => false], 400);
        }
        $result = $this->userService->updateUserById($userId, $userName, $userEmail, $userDepartment);

        return new JsonResponse(['success' => $result], $result ? 200 : 404);
    }

    /**
     * @Route("/{id}", methods={"DELETE"}, requirements={"id":"\d+"})
     * @param int $id
     * @return Response
     */
    public function deleteUserAction(int $id): Response
    {
        $result = $this->userService->deleteUserById($id);

        return new JsonResponse(['success' => $result], $result ? 200 : 404);
    }
}
