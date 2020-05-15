<?php


namespace App\Domain\Programme\Presenter;


use App\Infrastructure\Presenter\AbstractPresenter;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class FirstPagePresenter extends AbstractPresenter implements FirstPagePresenterInterface
{

    /**
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function present(): Response
    {
        return new Response($this->twig->render("programme/firstPage.html.twig", [
            "title" => "Début du programme",
        ]));
    }


}