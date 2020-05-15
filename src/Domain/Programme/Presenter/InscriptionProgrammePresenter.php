<?php


namespace App\Domain\Programme\Presenter;


use App\Domain\Programme\Responder\InscriptionProgrammeResponder;
use App\Infrastructure\Presenter\AbstractPresenter;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class InscriptionProgrammePresenter extends AbstractPresenter implements InscriptionProgrammePresenterInterface
{

    public function present(InscriptionProgrammeResponder $inscriptionProgrammeResponder): Response
    {
        return new Response($this->twig->render("programme/inscription/inscription.html.twig", [
            "form" => $inscriptionProgrammeResponder->getFormView(),
            "title" => "inscription au programme"
        ]));

    }

    public function redirect(UrlGeneratorInterface $urlGenerator): RedirectResponse
    {
        return new RedirectResponse($urlGenerator->generate("programme_connexion"));
    }


}