<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Service\ArticleServiceInterface;
use phpDocumentor\Reflection\Types\True_;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AddDataController
 */
class AddDataController extends AbstractController
{
    /** @var ArticleServiceInterface */
    private $articleService;

    public function __construct(ArticleServiceInterface $articleService)
    {
        $this->articleService = $articleService;

    }


    /**
     * @Route("api/blogs/create")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        $content = json_decode($request->getContent() , true);


        $article = new Article();


        $article->setTitle( $content['title']);
        $article->setSubtitle($content['subtitle']);
        $article->setImgUrl($content['img_url']);
        $article->setMainDesc($content['main_desc']);

        $this->articleService->save($article);

        return $this->redirect('/admin');
    }

}