<?php

namespace App\Controller\UI;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Twig\Environment;

/** @Route("users") */
class MainPageController extends AbstractController
{
    private Environment $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @Route("", methods={"GET"})
     * @return Response
     */
    public function getUsersAction(): Response
    {
        $content = $this->twig->render("UI/mainPage.html.twig");

        return new Response($content);
    }
}
