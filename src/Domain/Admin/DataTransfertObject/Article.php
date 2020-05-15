<?php


namespace App\Domain\Admin\DataTransfertObject;

use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Article
 * @package App\Domain\Admin\DataTransfertObject
 */
class Article
{

    /**
     * @var int
     */
    private int $id;

    /**
     * @var string|null
     */
    private ?string $title = null;

    /**
     * @var string|null
     */
    private ?string $titlePicture = null;

    /**
     * @var string|null
     */
    private ?string $content = null;

    /**
     * @var string|null
     */
    private ?string $category = null;

    /**
     * @var string|null
     */
    private ?string $introduction = null;


    /**
     * @var DateTimeImmutable
     */
    private DateTimeImmutable $publishedAt;

    /**
     * @var Collection
     */
    private Collection $comments;



    public function __construct()
    {
        $this->publishedAt = new DateTimeImmutable();
        $this->comments = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getTitlePicture(): ?string
    {
        return $this->titlePicture;
    }

    /**
     * @param string $titlePicture
     */
    public function setTitlePicture(?string $titlePicture): void
    {
        $this->titlePicture = $titlePicture;
    }

    /**
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(?string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory(?string $category): void
    {
        $this->category = $category;
    }

    /**
     * @return string|null
     */
    public function getIntroduction(): ?string
    {
        return $this->introduction;
    }

    /**
     * @param string $introduction
     */
    public function setIntroduction(?string $introduction): void
    {
        $this->introduction = $introduction;
    }


    /**
     * @return DateTimeImmutable
     */
    public function getPublishedAt(): DateTimeImmutable
    {
        return $this->publishedAt;
    }

    /**
     * @param DateTimeImmutable $publishedAt
     */
    public function setPublishedAt(DateTimeImmutable $publishedAt): void
    {
        $this->publishedAt = $publishedAt;
    }

    /**
     * @return Collection
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }






}