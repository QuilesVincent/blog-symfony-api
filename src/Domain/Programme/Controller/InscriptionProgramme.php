<?php


namespace App\Domain\Programme\Controller;


use App\Application\Entity\User;
use App\Domain\Programme\Handler\RegistrationHandler;
use App\Domain\Programme\Presenter\InscriptionProgrammePresenterInterface;
use App\Domain\Programme\Responder\InscriptionProgrammeResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class InscriptionProgramme
{

    /**
     * @param Request $request
     * @param RegistrationHandler $registrationHandler
     * @param InscriptionProgrammePresenterInterface $inscriptionProgrammePresenter
     * @return Response
     */
    public function __invoke(Request $request,
                             RegistrationHandler $registrationHandler,
                             InscriptionProgrammePresenterInterface $inscriptionProgrammePresenter): Response
    {
        if ($registrationHandler->handle($request, new User())) {
            return $inscriptionProgrammePresenter->redirect();
        }

        return $inscriptionProgrammePresenter->present(new InscriptionProgrammeResponder($registrationHandler->createView()));
    }

}