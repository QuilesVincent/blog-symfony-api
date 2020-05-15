<?php


namespace App\Domain\Api\Controller;




use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Serializer\SerializerInterface;

class AbstractApiController
{
    protected SerializerInterface $serializer;

    protected EventDispatcherInterface $eventDispatcher;

    /**
     * AbstractApiController constructor.
     * @param SerializerInterface $serializer
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(SerializerInterface $serializer, EventDispatcherInterface $eventDispatcher)
    {
        $this->serializer = $serializer;
        $this->eventDispatcher = $eventDispatcher;
    }


}