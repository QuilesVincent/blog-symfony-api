<?php


namespace App\Domain\Admin\Presenter;


use App\Domain\Admin\Responder\GestionArticlesResponder;
use Symfony\Component\HttpFoundation\Response;

interface GestionArticlePresenterInterface
{

    /**
     * @param GestionArticlesResponder $gestionArticleResponder
     * @return Response
     */
    public function present(GestionArticlesResponder $gestionArticleResponder): Response;

}