<?php


namespace App\Domain\Api\Presenter;


use App\Application\Entity\TokenApi;
use App\Domain\Api\Responder\ConnexionApiResponder;
use App\Infrastructure\Presenter\AbstractPresenter;
use Symfony\Component\HttpFoundation\Response;

class ConnexionApiPresenter extends AbstractPresenter implements ConnexionApiPresenterInterface
{

    /**
     * @param ConnexionApiResponder $connexionApiResponder
     * @param TokenApi|null $tokenApi
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function present(ConnexionApiResponder $connexionApiResponder, ?TokenApi $tokenApi = null): Response
    {
        return new Response($this->twig->render("api/connexionApi.html.twig", [
            "form" => $connexionApiResponder->getFormView(),
            "title" => "Connexion Api"
        ]));
    }
}