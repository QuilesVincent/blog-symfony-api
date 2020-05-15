<?php


namespace App\Domain\Api\Controller;


use App\Application\Entity\Article;
use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\Response;

class ReadArticleApi extends AbstractApiController
{

    public function __invoke(Article $article): Response
    {
        $data = $this->serializer->serialize(
            $article,
            "json",
            SerializationContext::create()->setGroups(["global"])
        );
        $response = new Response($data);

        $response->headers->set("Content-type", "application/json");

        return $response;

    }

}