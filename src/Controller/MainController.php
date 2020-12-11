<?php

namespace App\Controller;

use App\Service\ArticleServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;



class MainController extends AbstractController
{
    private $articleService;

    public function __construct( ArticleServiceInterface $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * @Route("/{reactRouting}", name="home", defaults={"reactRouting": null})
     */
    public function __invoke()
    {
        return $this->render('main/index.html.twig');
    }
}
