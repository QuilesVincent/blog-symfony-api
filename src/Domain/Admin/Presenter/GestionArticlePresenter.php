<?php


namespace App\Domain\Admin\Presenter;


use App\Domain\Admin\Responder\GestionArticlesResponder;
use App\Infrastructure\Presenter\AbstractPresenter;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class GestionArticlePresenter extends AbstractPresenter implements GestionArticlePresenterInterface
{

    public function present(GestionArticlesResponder $gestionArticleResponder): Response
    {
        return new Response($this->twig->render("admin/modifArticle.html.twig", [
            "title" => "Connexion validate",
            "articles" => $gestionArticleResponder->getItem(),
        ]));
    }
}