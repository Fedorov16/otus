<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/main", name="main")
 */

class DefaultController extends AbstractController
{

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/all", name="all")
     */
    public function indexAction()
    {
       $user =  $this->entityManager->getRepository(User::class);
       dump($user->getAllUserIDs()); die();
        return $this->render('main/main.html.twig');
    }
}
