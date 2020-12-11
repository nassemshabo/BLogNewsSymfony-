<?php


namespace App\Service;


use App\DataAccess\ArticleGatewayInterface;
use App\DataTransfer\ArticleDTO;
use App\Entity\Article;
use phpDocumentor\Reflection\Types\This;

class ArticleService implements ArticleServiceInterface
{
    /** @var ArticleGatewayInterface */
    private $articleGateway;

    public function __construct(ArticleGatewayInterface $articleGateway)
    {
        $this->articleGateway = $articleGateway;
    }

    /**
     * @return array
     */
    public function fetchAll()
    {
        return $this->articleGateway->findAll();
    }

    /**
     * @param string $id
     * @return ArticleDTO
     */
    public function findById(string $id) {
        return  $this->articleGateway->findById($id);
    }

    /**
     * @param ArticleDTO $articleDTO
     * @return bool
     */
    public function save(ArticleDTO $articleDTO) {

        return $this->articleGateway->save($articleDTO);
    }


    /**
     * @param string $id
     *
     * @return bool
     */
    public function delete(string $id): bool
    {
        return $this->articleGateway->delete($id);
    }


}