<?php

namespace App\Controller\Api\v1;

use App\Entity\Discipline;
use App\Service\DisciplineService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/** @Route("/api/v1/discipline") */
class DisciplineController
{
    /**
     * @var DisciplineService
     */
    private DisciplineService $disciplineService;

    public function __construct(DisciplineService $disciplineService)
    {
        $this->disciplineService = $disciplineService;
    }

    /**
     * @Route("", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function saveDisciplineAction(Request $request): Response
    {
        $name = $request->request->get('name');
        if ($this->disciplineService->isDisciplineExistByName($name)) {
            return new JsonResponse(['success' => false, 'discipline ' . strtoupper($name) . ' is already exist'], 400);
        }
        $disciplineId = $this->disciplineService->saveDiscipline($name);
        [$data, $code] = $disciplineId === null ?
            [['success' => false], 400] :
            [['success' => true, 'disciplineId' => $disciplineId], 200];

        return new JsonResponse($data, $code);
    }

    /**
     * @Route("", methods={"GET"})
     */
    public function getDisciplineAction(): Response
    {
        $disciplines = $this->disciplineService->getAllDisciplines();
        $code = !empty($disciplines)? 200 : 204;

        return new JsonResponse(['disciplines' => array_map(static fn(Discipline $discipline) => $discipline->toArray(), $disciplines)], $code);
    }

    /**
     * @Route("/{id}", methods={"DELETE"}, requirements={"id":"\d+"})
     * @param int $id
     * @return Response
     */
    public function deleteDisciplineAction(int $id): Response
    {
        $result = $this->disciplineService->deleteDisciplineById($id);

        return new JsonResponse(['success' => $result], $result ? 200 : 404);
    }

    /**
     * @Route("", methods={"PATCH"})
     * @param Request $request
     * @return Response
     */
    public function updateDisciplineAction(Request $request): Response
    {
        $disciplineId = $request->query->get('disciplineId');
        $name = $request->query->get('name');
        $result = $this->disciplineService->updateDisciplineById($disciplineId, $name);

        return new JsonResponse(['success' => $result], $result ? 200 : 404);
    }
}
