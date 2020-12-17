<?php

namespace App\Controller\Admin;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class SaveEditArticleController extends AbstractController
{
    /***
     * @Route('api/admin/edit/save')
     * @param Request $request
     */
    public function __invoke (Request $request )
    {
         $article = $request->getContent();

         dd($article);
    }

}