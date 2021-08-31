<?php

namespace App\Controller\Api\v1;

use App\Entity\Department;
use App\Service\DepartmentService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/** @Route("/api/v1/department") */
class DepartmentController
{
    /**
     * @var DepartmentService
     */
    private DepartmentService $departmentService;

    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }

    /**
     * @Route("", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function saveDepartmentAction(Request $request): Response
    {
        $name = $request->request->get('name');
        if ($this->departmentService->isDepartmentExistByName($name)) {
            return new JsonResponse(['success' => false, 'department ' . strtoupper($name) . ' is already exist'], 400);
        }
        $departmentId = $this->departmentService->saveDepartment($name);
        [$data, $code] = $departmentId === null ?
            [['success' => false], 400] :
            [['success' => true, 'departmentId' => $departmentId], 200];

        return new JsonResponse($data, $code);
    }

    /**
     * @Route("", methods={"GET"})
     */
    public function getDepartmentAction(): Response
    {
        $departments = $this->departmentService->getAllDepartments();
        $code = !empty($departments)? 200 : 204;

        return new JsonResponse(['departments' => array_map(static fn(Department $department) => $department->toArray(), $departments)], $code);
    }

    /**
     * @Route("/{id}", methods={"DELETE"}, requirements={"id":"\d+"})
     * @param int $id
     * @return Response
     */
    public function deleteDepartmentAction(int $id): Response
    {
        $result = $this->departmentService->deleteDepartmentById($id);

        return new JsonResponse(['success' => $result], $result ? 200 : 404);
    }

    /**
     * @Route("", methods={"PATCH"})
     * @param Request $request
     * @return Response
     */
    public function updateDepartmentAction(Request $request): Response
    {
        $departmentId = $request->query->get('departmentId');
        $name = $request->query->get('name');
        $result = $this->departmentService->updateDepartmentById($departmentId, $name);

        return new JsonResponse(['success' => $result], $result ? 200 : 404);
    }
}
