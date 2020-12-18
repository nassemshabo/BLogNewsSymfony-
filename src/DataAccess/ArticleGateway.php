<?php


namespace App\DataAccess;


use App\DataMapper\ArticleDataMapper;
use App\DataTransfer\ArticleDTO;
use App\Entity\Article;
use ContainerBzwJDNm\getDoctrine_Orm_DefaultEntityManager_PropertyInfoExtractorService;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

class ArticleGateway implements ArticleGatewayInterface
{
    /** @var EntityManagerInterface */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @return array
     */
    public function findAll(){
        $repository = $this->em->getRepository(Article::class);
       $articles =  $repository->findAll();

        return ArticleDataMapper::mapEntitiesToDtos($articles);
    }

    /**
     * @param string $id
     * @return ArticleDTO|null
     *
     */
    public function findById(string $id){
        $repository = $this->em->getRepository(Article::class);
        /** @var  Article $article  */
        $article = $repository->findOneBy([
            'id' => $id
        ]);
        return  ArticleDataMapper::mapEntityToDto($article);
    }


    /**
     * @param string $id
     * @return false
     */
    public function delete(string $id){
        try {
            $article = $this->em->find(Article::class, $id);
            $this->em->remove($article);
            $this->em->flush();
        }catch (Exception $error) {
            return false;
        }
        return true;
    }

    /**
     * @param ArticleDTO $articleDTO
     * @return bool
     */
    public function save(ArticleDTO $articleDTO){
        $article = ArticleDataMapper::mapDtoToEntity($articleDTO);

        try {
            $this->em->merge($article);
            $this->em->flush();
            $this->em->clear();
        } catch (Exception $e) {
            return false;
        }
        return true;
    }
}