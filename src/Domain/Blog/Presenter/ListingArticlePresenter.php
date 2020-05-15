<?php


namespace App\Domain\Blog\Presenter;


use App\Domain\Blog\Responder\ListingArticlesResponder;
use App\Infrastructure\Presenter\AbstractPresenter;
use Symfony\Component\HttpFoundation\Response;

class ListingArticlePresenter extends AbstractPresenter implements ListingArticlePresenterInterface
{

    public function present(ListingArticlesResponder $responder): Response
    {
        return new Response($this->twig->render("blog/index.html.twig", [
            "articles" => $responder->getItem(),
            "title" => "index"
        ]));
    }
}