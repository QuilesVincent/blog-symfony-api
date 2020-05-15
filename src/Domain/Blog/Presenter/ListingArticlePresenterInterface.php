<?php


namespace App\Domain\Blog\Presenter;


use App\Domain\Blog\Responder\ListingArticlesResponder;
use Symfony\Component\HttpFoundation\Response;

/**
 * Interface PresenterInterface
 * @package App\Domain\Blog\Presenter
 */
interface ListingArticlePresenterInterface
{
    /**
     * @param ListingArticlesResponder $responder
     * @return Response
     */
    public function present(ListingArticlesResponder $responder): Response;

}