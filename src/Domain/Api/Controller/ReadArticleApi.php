<?php


namespace App\Domain\Api\Controller;


use ApiPlatform\Core\Serializer\SerializerContextBuilder;
use ApiPlatform\Core\Serializer\SerializerContextBuilderInterface;
use App\Application\Entity\Article;
use Symfony\Component\HttpFoundation\Response;

class ReadArticleApi extends AbstractApiController
{

    /**
     * @param Article $article
     * @return Response
     */
    public function __invoke(Article $article): Response
    {
        $data = $this->serializer->serialize(
            $article,
            "json",
            [
                "circular_reference_handler" => function ($object) {
                    return $object->getId();
                },
                "groups" => ["global"]
            ]
        );
        $response = new Response($data);

        $response->headers->set("Content-type", "application/json");

        return $response;

    }

}