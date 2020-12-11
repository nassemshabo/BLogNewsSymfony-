<?php


namespace App\Service;


use App\DataTransfer\ArticleDTO;
use App\Entity\Article;

interface ArticleServiceInterface
{
    /**
     * @return array
     */
    public function fetchAll();

    /**
     * @param string $id
     * @return ArticleDTO
     */
    public function findById(string $id);

    /**
     * @param ArticleDTO $articleDTO
     * @return bool
     */
    public function save(ArticleDTO $articleDTO);

    /**
     * @param string $id
     * @return false
     */
    public function delete(string $id);

}