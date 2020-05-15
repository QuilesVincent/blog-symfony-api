<?php


namespace App\Domain\Programme\Presenter;


use App\Domain\Programme\Responder\ConnexionProgrammeResponder;
use App\Infrastructure\Presenter\AbstractPresenter;
use Symfony\Component\HttpFoundation\Response;

class ConnexionProgrammePresenter extends AbstractPresenter implements ConnexionProgrammePresenterInterface
{

    /**
     * @param ConnexionProgrammeResponder $connexionProgrammeResponder
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function present(ConnexionProgrammeResponder $connexionProgrammeResponder): Response
    {
        return new Response($this->twig->render("programme/login/connexion.html.twig", [
            "form" => $connexionProgrammeResponder->getFormView(),
            "title" => "connexion au programme"
        ]));
    }


}