<?php

namespace App\Controller\Api\v1;

use App\Entity\User;
use App\Form\UserSaveForm;
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
        $perPage = $request->request->get('perPage');
        $page = $request->request->get('page');
        $users = $this->userService->getAllUsers($page ?? 0, $perPage ?? 20);

        $code = empty($users) ? 204:200;

        return new JsonResponse(['users' => array_map(static fn(User $user) => $user->toArray(), $users)], $code);
    }

    /**
     * @Route("/form/{id}", methods={"GET"}, requirements={"id":"\d+"})
     * @param int $id
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function getUpdateFormUsersAction(int $id): Response
    {
        $userData = $this->userService->getUserData($id);
        $form = $this->createForm(UserSaveForm::class, '', $userData);
        $content = $this->twig->render("user/userSaveForm.html.twig", [
            'form' => $form->createView(),
        ]);

        return new Response($content);
    }

    /**
     * @Route("/form/{id}", methods={"POST"}, requirements={"id":"\d+"})
     * @param Request $request
     * @param int $id
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function updateFormUsersAction(Request $request, int $id): Response
    {
        $form = $this->createForm(UserSaveForm::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $userName = $form['name']->getData();
            $userEmail = $form['email']->getData();
            $departmentName = $form['department']->getData();
            $this->userService->updateUserById($id, $userName, $userEmail, $departmentName);
        }
        $content = $this->twig->render("user/userSaveForm.html.twig", [
            'form' => $form->createView(),
        ]);

        return new Response($content);
    }

    /**
     * @Route("", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function saveUserAction(Request $request): Response
    {
        $userName = $request->request->get('name');
        $userEmail = $request->request->get('email');
        $userPassword = $request->request->get('password');
        $userDepartment = $request->request->get('department');

        if ($this->userService->isUserExistByEmail($userEmail)) {
            return new JsonResponse(['success' => false, 'email ' . strtolower($userEmail) . ' is already exist'], 400);
        }

        if (!$this->userService->getDepartmentByName($userDepartment)) {
            return new JsonResponse(['success' => false, 'department ' . $userDepartment . ' doesn\'t exist'], 400);
        }

        $userId = $this->userService->saveUser($userName, $userEmail, $userPassword, $userDepartment);
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
