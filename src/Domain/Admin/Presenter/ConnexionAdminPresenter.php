<?php


namespace App\Domain\Admin\Presenter;



use App\Domain\Admin\Responder\ConnexionAdminResponder;
use App\Infrastructure\Presenter\AbstractPresenter;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class ConnexionAdminPresenter extends AbstractPresenter implements ConnexionAdminPresenterInterface
{

    /**
     * @param ConnexionAdminResponder $connexionAdminResponder
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function present(ConnexionAdminResponder $connexionAdminResponder): Response
    {
        return new Response($this->twig->render("admin/connexionAdmin.html.twig", [
            "form" => $connexionAdminResponder->getFormView(),
            "title" => "Connexion admin"
        ]));
    }
}