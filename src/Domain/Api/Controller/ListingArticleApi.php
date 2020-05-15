<?php


namespace App\Domain\Api\Controller;


use App\Application\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use JMS\Serializer\Annotation\PostSerialize;
use JMS\Serializer\EventDispatcher\Events;
use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\Response;

class ListingArticleApi extends AbstractApiController
{

    public function __invoke(EntityManagerInterface $entityManager): Response
    {
        $articles = $entityManager->getRepository(Article::class)->findAll();
        $data = $this->serializer->serialize(
            $articles,
            "json",
            SerializationContext::create()->setGroups(["global"])
        );


        $response = new Response($data);
        $response->headers->set("Content-type", "application/json");

        return $response;
    }

}