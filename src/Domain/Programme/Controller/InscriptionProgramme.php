<?php


namespace App\Domain\Programme\Controller;


use App\Application\Entity\User;
use App\Domain\Programme\Handler\RegistrationHandler;
use App\Domain\Programme\Presenter\InscriptionProgrammePresenterInterface;
use App\Domain\Programme\Responder\InscriptionProgrammeResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class InscriptionProgramme
{

    /**
     * @param Request $request
     * @param RegistrationHandler $registrationHandler
     * @param InscriptionProgrammePresenterInterface $inscriptionProgrammePresenter
     * @param UrlGeneratorInterface $urlGenerator
     * @return Response
     */
    public function __invoke(Request $request,
                             RegistrationHandler $registrationHandler,
                             InscriptionProgrammePresenterInterface $inscriptionProgrammePresenter,
                             UrlGeneratorInterface $urlGenerator): Response
    {
        if ($registrationHandler->handle($request, new User())) {
            return $inscriptionProgrammePresenter->redirect($urlGenerator);
        }

        return $inscriptionProgrammePresenter->present(new InscriptionProgrammeResponder($registrationHandler->createView()));
    }

}