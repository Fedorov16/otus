<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/main", name="main")
 */

class DefaultController extends AbstractController
{
    /**
     * @Route("/all", name="all")
     */
    public function indexAction()
    {
        return $this->render('main/main.html.twig');
    }

}
