<?php

namespace App\Controller\Api\v1;

use App\Entity\User;
use App\Service\UserService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/** @Route("/api/v1/user") */
class UserController
{
    /**
     * @var UserService
     */
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @Route("", methods={"GET"})
     */
    public function getUsersAction(Request $request): Response
    {
        $perPage = $request->query->get('perPage');
        $page = $request->query->get('page');
        $users = $this->userService->getAllUsers($page ?? 0, $perPage ?? 20);

        $code = empty($users) ? 204:200;

        return new JsonResponse(['users' => array_map(static fn(User $user) => $user->toArray(), $users)], $code);
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
        $userPassword = $request->query->get('password');
        $userDepartment = $request->query->get('department');

        $result = $this->userService->updateUserById($userId, $userName, $userEmail, $userPassword, $userDepartment);

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
