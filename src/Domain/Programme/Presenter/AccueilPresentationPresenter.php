<?php


namespace App\Domain\Programme\Presenter;


use App\Infrastructure\Presenter\AbstractPresenter;
use Symfony\Component\HttpFoundation\Response;

class AccueilPresentationPresenter extends AbstractPresenter implements AccueilPresentationPresenterInterface
{

    public function present(): Response
    {
        return new Response($this->twig->render("programme/presentation.html.twig", [
            "title" => "presentation du programme"
        ]));
    }

}