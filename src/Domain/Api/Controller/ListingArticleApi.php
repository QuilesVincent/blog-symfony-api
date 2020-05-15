<?php


namespace App\Domain\Api\Controller;


use App\Application\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ListingArticleApi extends AbstractApiController
{

    /**
     * @param EntityManagerInterface $entityManager
     * @param NormalizerInterface $normalizer
     * @return Response
     */
    public function __invoke(EntityManagerInterface $entityManager, NormalizerInterface $normalizer): Response
    {
        $articles = $entityManager->getRepository(Article::class)->findAll();

        $data = $this->serializer->serialize(
            $articles,
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