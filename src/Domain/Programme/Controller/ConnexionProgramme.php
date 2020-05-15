<?php


namespace App\Domain\Programme\Controller;


use App\Domain\Programme\DataTransfertObject\Credentials;
use App\Domain\Programme\Form\UserType;
use App\Domain\Programme\Presenter\ConnexionProgrammePresenterInterface;
use App\Domain\Programme\Responder\ConnexionProgrammeResponder;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class ConnexionProgramme
{

    /**
     * @param AuthenticationUtils $authenticationUtils
     * @param Request $request
     * @param FormFactoryInterface $formFactory
     * @param ConnexionProgrammePresenterInterface $connexionProgrammePresenter
     * @return Response
     */
    public function __invoke(AuthenticationUtils $authenticationUtils,
                             Request $request,
                             FormFactoryInterface $formFactory,
                             ConnexionProgrammePresenterInterface $connexionProgrammePresenter): Response
    {
        $form = $formFactory->create(UserType::class, new Credentials($authenticationUtils->getLastUsername()))->handleRequest($request);
        if (null !== $authenticationUtils->getLastAuthenticationError(false)) {
            $form->addError(new FormError($authenticationUtils->getLastAuthenticationError()->getMessage()));
        }
        return $connexionProgrammePresenter->present(new ConnexionProgrammeResponder($form->createView()));
    }

}