<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=36)
     *
     * @Assert\NotBlank()
     * @Assert\Uuid()
     *
     * @var string
     */
    private string $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $subtitle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $imgUrl;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $mainDesc;


    /**
     * @ORM\Column(type="boolean")
     */
    private bool $activated;


    /**
     * Article constructor.
     */
    public function __construct()
    {
        $this->id = Uuid::uuid4()->toString();
    }

    public function getId(): ?string
    {
        return $this->id;
    }


    public function setId(string $id)
    {
        $this->id = $id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function setSubtitle(string $subtitle): self
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    public function getImgUrl(): ?string
    {
        return $this->imgUrl;
    }

    public function setImgUrl(string $imgUrl): self
    {
        $this->imgUrl = $imgUrl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMainDesc()
    {
        return $this->mainDesc;
    }

    /**
     * @param mixed $mainDesc
     */
    public function setMainDesc($mainDesc): void
    {
        $this->mainDesc = $mainDesc;
    }

    /**
     * @return bool
     */
    public function getActivated()
    {
        return $this->activated;
    }

    /**
     * @param bool $activated
     */
    public function setActivated($activated): void
    {
        $this->activated = $activated;
    }

}
