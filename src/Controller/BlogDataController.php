<?php

namespace App\Controller;

use App\Service\ArticleServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;


class BlogDataController extends AbstractController
{

    private ArticleServiceInterface $articleService;

    public function __construct(ArticleServiceInterface $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * @Route("/api/users", name="mainpage")
     *
     */
    public function __invoke()
    {
       $articles = $this->articleService->fetchAll();

       return $this->json(['data' => $articles]);
    }
}