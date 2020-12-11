<?php


namespace App\DataAccess;


use App\DataTransfer\ArticleDTO;
use App\Entity\Article;

interface ArticleGatewayInterface
{
    /**
     * @return array
     */
    public function findAll();


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
     * @return bool
     */
    public function delete(string $id);

}