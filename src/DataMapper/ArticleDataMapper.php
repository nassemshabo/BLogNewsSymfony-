<?php


namespace App\DataMapper;


use App\DataTransfer\ArticleDTO;
use App\Entity\Article;
use Exception;

class ArticleDataMapper
{
    /**
     * @param ArticleDTO $articleDTO
     *
     * @return Article
     *
     */
    public static function mapDtoToEntity(ArticleDTO $articleDTO ) :Article
    {
        $article = new Article();
        $article->setId($articleDTO->id);
        $article->setTitle($articleDTO->title);
        $article->setSubtitle($articleDTO->subtitle);
        $article->setMainDesc($articleDTO->mainDesc);
        $article->setImgUrl($articleDTO->imgUrl);
        $article->setActivated($articleDTO->activated);

        return $article;
    }

    /**
     * @param Article $article
     *
     * @return ArticleDTO
     *
     */
    public static function mapEntityToDto(Article $article): ArticleDTO
    {
        $articleDTO             = new ArticleDTO();
        $articleDTO->id         = $article->getId();
        $articleDTO->title      = $article->getTitle();
        $articleDTO->subtitle   = $article->getSubtitle();
        $articleDTO->mainDesc   = $article->getMainDesc();
        $articleDTO->imgUrl     = $article->getImgUrl();
        $articleDTO->activated  = $article->isActivated();

        return $articleDTO;
    }

    /**
     * @param array $articles
     *
     * @return array<ArticleDTO>
     *
     * @throws Exception
     */
    public static function mapEntitiesToDtos(array $articles): array
    {
        $articleDTOS = [];

        /** @var Article $item */
        foreach ($articles as $item) {
            $articleDTOS[] = self::mapEntityToDto($item);
        }

        return $articleDTOS;
    }
}