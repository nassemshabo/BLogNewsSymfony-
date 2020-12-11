<?php

namespace App\Controller\Admin;

use App\Service\ArticleServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AddDataController
 */
class AktivatBlogController extends AbstractController
{
    /** @var ArticleServiceInterface */
    private ArticleServiceInterface $articleService;


    public function __construct(ArticleServiceInterface $articleService )
    {
        $this->articleService = $articleService;
    }

    /**
     * @Route("api/blogs/aktivate")
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request)
    {
        $id = $request->getContent();

        $articleDTO = $this->articleService->findById($id);
        $articleDTO->activated = !$articleDTO->activated;

        $this->articleService->save($articleDTO);

        if($articleDTO->activated == 0 ) {
            return  $this->json('item hast been inactivated');
        }else {
            return $this->json('item has been activated');
        }
    }
}