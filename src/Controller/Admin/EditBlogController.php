<?php

namespace App\Controller\Admin;

use App\Service\ArticleServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AddDataController
 */
class EditBlogController extends AbstractController
{
    /** @var ArticleServiceInterface */
    private $articleService;


    public function __construct(ArticleServiceInterface $articleService )
    {
        $this->articleService = $articleService;
    }

    /**
     * @Route("api/admin/edit")
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request)
    {
        $id = $request->getContent();
        $article = $this->articleService->findById($id);

        return $this->json($article);
    }

}