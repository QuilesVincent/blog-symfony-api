<?php


namespace App\Domain\Blog\Responder;


use App\Infrastructure\Responder\AbstractResponder;

/**
 * Class ListingArticlesResponder
 * @package App\Domain\Blog\Responder
 */
class ListingArticlesResponder
{

    /**
     * @var array
     */
    private array $item;

    /**
     * ListingArticlesResponder constructor.
     * @param array $item
     */
    public function __construct(array $item)
    {
        $this->item = $item;
    }

    /**
     * @return array
     */
    public function getItem()
    {
        return $this->item;
    }

}