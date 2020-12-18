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
    private string $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $subtitle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $imgUrl;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private string $mainDesc;


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

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getSubtitle(): string
    {
        return $this->subtitle;
    }

    /**
     * @param string $subtitle
     */
    public function setSubtitle(string $subtitle): void
    {
        $this->subtitle = $subtitle;
    }

    /**
     * @return string
     */
    public function getImgUrl(): string
    {
        return $this->imgUrl;
    }

    /**
     * @param string $imgUrl
     */
    public function setImgUrl(string $imgUrl): void
    {
        $this->imgUrl = $imgUrl;
    }

    /**
     * @return string
     */
    public function getMainDesc(): string
    {
        return $this->mainDesc;
    }

    /**
     * @param string $mainDesc
     */
    public function setMainDesc(string $mainDesc): void
    {
        $this->mainDesc = $mainDesc;
    }

    /**
     * @return bool
     */
    public function isActivated(): bool
    {
        return $this->activated;
    }

    /**
     * @param bool $activated
     */
    public function setActivated(bool $activated): void
    {
        $this->activated = $activated;
    }
}
