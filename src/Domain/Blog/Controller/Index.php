<?php


namespace App\Domain\Blog\Controller;


use App\Application\Entity\Article;
use App\Domain\Blog\Presenter\ListingArticlePresenterInterface;
use App\Domain\Blog\Responder\ListingArticlesResponder;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Index
{

    /**
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param ListingArticlePresenterInterface $presenter
     * @return Response
     */
    public function __invoke(Request $request,
                          EntityManagerInterface $entityManager,
                          ListingArticlePresenterInterface $presenter): Response
    {

        $articles = $entityManager->getRepository(Article::class)->findAll();

        return $presenter->present(new ListingArticlesResponder($articles));
    }

}