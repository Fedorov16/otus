<?php

namespace App\Service;

use App\Entity\Department;
use App\Entity\Progress;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class ProgressService
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $em;

    public function __construct(
        EntityManagerInterface $em
    ) {
        $this->em = $em;
    }

    public function deleteProgressById(int $progressId): bool
    {
        $progress = $this->em->getRepository(Progress::class)->find($progressId);
        if ($progress === null) {
            return false;
        }

        return $this->deleteProgress($progress);
    }

    public function deleteProgress(Progress $progress): bool
    {
        $this->em->remove($progress);
        $this->em->flush();

        return true;
    }

    public function getProgressByUser(int $userId): ?array
    {
        if (!$this->isUserExistById($userId)) {
            return null;
        }

        $progressByUser = $this->em->getRepository(Progress::class)->getProgressByUserId($userId);
        return empty($progressByUser) ? null : $progressByUser;
    }

    public function getProgressByDepartment(int $departmentId): ?array
    {
        if(!$this->isDepartmentExistById($departmentId)) {
            return null;
        }

        $progressByDepartment = $this->em->getRepository(Progress::class)->getProgressByDepartmentId($departmentId);

        return empty($progressByDepartment) ? null : $this->prepareProgressByDepartment($progressByDepartment);
    }

    public function isUserExistById(int $id): bool
    {
        return !empty($this->em->getRepository(User::class)->getUserById($id));
    }

    public function isDepartmentExistById(int $id): bool
    {
        return !empty($this->em->getRepository(Department::class)->getDepartmentById($id));
    }

    public function prepareProgressByDepartment(array $progressByDepartment): array
    {
        $progressDepartment = [];
        foreach ($progressByDepartment as $progress) {
            if (!in_array($progress['name'], $progressDepartment, true)) {
                $progressDepartment[$progress['name']]['level'] = $progress['level'];
                $progressDepartment[$progress['name']]['percent'] = $progress['percent'];
                $progressDepartment[$progress['name']]['necessaryLevel'] = $progress['necessaryLevel'];
            } else{
                $newData = $this->countPercent(
                    $progressDepartment[$progress['name']]['level'],
                    $progress['level'],
                    $progressDepartment[$progress['name']]['percent'],
                    $progress['percent'],
                );
                $progressDepartment[$progress['name']]['level'] = $newData['level'];
                $progressDepartment[$progress['name']]['percent'] = $newData['percent'];
            }
        }

        return $progressDepartment;
    }

    public function countPercent(int $currentLevel, int $newLevel, int $currentPercent, $newPercent): array
    {
        $resultCount = floor((($currentLevel + $newLevel) * 100 + $currentPercent + $newPercent) / 2);
        $resultCount = str_split($resultCount);

        $level = $resultCount[0];
        $percent = $resultCount[1] . $resultCount[2];
        return ['level' => (int)$level, 'percent' => (int)$percent];
    }

    public function addAllProgressToUserByDepartment(int $id) :bool
    {
        $user = $this->em->getRepository(User::class)->find($id);
        $departmentDisciplines = $user->getDepartment()->getDisciplines();
        foreach ($departmentDisciplines as $departmentDiscipline) {
            $progress = new Progress();
            $progress
                ->setUser($user)
                ->setDiscipline($departmentDiscipline)
                ->setPercent(0);
            $progress->setLevel(0);
            $progress->setNecessaryLevel(5);

            $this->em->persist($progress);
        }
        $this->em->flush();
        return true;
    }

    public function deleteAllProgressToUserByPreviousDepartment(int $id): void
    {
        $user = $this->em->getRepository(User::class)->find($id);
        $allProgress = $user->getProgress();
        foreach ($allProgress as $progress) {
            $this->em->remove($progress);
        }
        $this->em->flush();
    }
}
