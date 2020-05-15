<?php


namespace App\Domain\Admin\Responder;


class GestionArticlesResponder
{

    private array $item;

    /**
     * GestionArticlesResponder constructor.
     * @param array $item
     */
    public function __construct(array $item)
    {
        $this->item = $item;
    }

    /**
     * @return array
     */
    public function getItem(): array
    {
        return $this->item;
    }




}