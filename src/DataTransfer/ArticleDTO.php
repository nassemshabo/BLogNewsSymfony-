<?php


namespace App\DataTransfer;

use Ramsey\Uuid\Uuid;

class ArticleDTO
{

    public ?string  $id;

    public ?string  $title;

    public ?string $subtitle;

    public ?string $imgUrl;

    public ?string $mainDesc;

    public bool $activated;


    public function __construct()
    {
        $this->id      = Uuid::uuid4()->toString();
    }
}