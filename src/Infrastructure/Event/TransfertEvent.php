<?php


namespace App\Infrastructure\Event;


use Symfony\Contracts\EventDispatcher\Event;

/**
 * Class TransfertEvent
 * @package App\Infrastructure\Event
 */
class TransfertEvent extends Event
{

    const NAME = "app.event.Transfert";
    /**
     * @var object
     */
    private object $originalData;

    /**
     * @var object
     */
    private object $data;

    /**
     * TransfertEvent constructor.
     * @param object $originalData
     * @param object $data
     */
    public function __construct(object $originalData, object $data)
    {
        $this->originalData = $originalData;
        $this->data = $data;
    }

    /**
     * @return object
     */
    public function getOriginalData(): object
    {
        return $this->originalData;
    }

    /**
     * @return object
     */
    public function getData(): object
    {
        return $this->data;
    }




}