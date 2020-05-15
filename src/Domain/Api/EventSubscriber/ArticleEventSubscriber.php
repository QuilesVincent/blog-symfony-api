<?php


namespace App\Domain\Api\EventSubscriber;


use JMS\Serializer\EventDispatcher\Events;
use JMS\Serializer\EventDispatcher\ObjectEvent;
use JMS\Serializer\Metadata\StaticPropertyMetadata;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;


class ArticleEventSubscriber implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {
        return [
            "events" => Events::POST_SERIALIZE,
            "format" => "json",
            "class" => "App\Application\Entity\Article",
            "method" => "onPostSerialize",
        ];
    }

    public function onPostSerialize(ObjectEvent $event)
    {
        $object = $event->getObject();

        $date = new \DateTimeImmutable();


        $event->getVisitor()->visitProperty(
            new StaticPropertyMetadata(
                "",
                "delivered_at",
                null
            ),
            $date->format('l jS \of F Y h:i:s A')
        );

    }

}