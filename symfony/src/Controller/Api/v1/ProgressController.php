<?php

namespace App\Controller\Api\v1;

use App\Service\ProgressService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/** @Route("/api/v1/progress") */
class ProgressController
{
    /**
     * @var ProgressService
     */
    private ProgressService $progressService;

    public function __construct(ProgressService $progressService)
    {
        $this->progressService = $progressService;
    }

    /**
     * @Route("/user/{id}", methods={"GET"}, requirements={"id":"\d+"})
     * @param int $id
     * @return Response
     */
    public function getProgressByUserAction(int $id): Response
    {
        $progressByUser = $this->progressService->getProgressByUser($id);

        $code = $progressByUser === null ? 400 : 200;

        return new JsonResponse(['progress' => $progressByUser], $code);
    }

    /**
     * @Route("/department/{id}", methods={"GET"}, requirements={"id":"\d+"})
     * @param int $id
     * @return Response
     */
    public function getProgressByDepartmentAction(int $id): Response
    {
        $progressByUser = $this->progressService->getProgressByDepartment($id);

        $code = $progressByUser === null ? 400 : 200;

        return new JsonResponse(['progress' => $progressByUser], $code);
    }

    /**
     * @Route("/{id}", methods={"DELETE"}, requirements={"id":"\d+"})
     * @param int $id
     * @return Response
     */
    public function deleteProgressAction(int $id): Response
    {
        $result = $this->progressService->deleteProgressById($id);
        return new JsonResponse(['success' => $result], $result ? 200 : 404);
    }

    /**
     * @Route("/user/{id}", methods={"POST"}, requirements={"id":"\d+"})
     * @param int $id
     * @return Response
     */
    public function addAllProgressToUserByDepartmentAction(int $id): Response
    {
        if (!$this->progressService->isUserExistById($id)) {
            return new JsonResponse(['success' => false, 'user is not exist'], 400);
        }
        if ($this->progressService->getProgressByUser($id)) {
            return new JsonResponse(['success' => false, 'user already have progress'], 400);
        }

        $progress = $this->progressService->addAllProgressToUserByDepartment($id);
        [$data, $code] = $progress === null ?
            [['success' => false], 400] :
            [['success' => true], 200];

        return new JsonResponse($data, $code);
    }
}
