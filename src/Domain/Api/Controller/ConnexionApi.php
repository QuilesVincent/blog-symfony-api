<?php


namespace App\Domain\Api\Controller;


use App\Domain\Admin\DataTransfertObject\Credentials;
use App\Domain\Admin\Form\UserType;
use App\Domain\Api\Presenter\ConnexionApiPresenterInterface;
use App\Domain\Api\Responder\ConnexionApiResponder;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class ConnexionApi extends AbstractApiController
{

    public function __invoke(Request $request,
                             FormFactoryInterface $formFactory,
                             AuthenticationUtils $authenticationUtils,
                             ConnexionApiPresenterInterface $connexionApiPresenter): Response
    {
        $form = $formFactory->create(UserType::class, new Credentials($authenticationUtils->getLastUsername()))->handleRequest($request);
        if (null !== $authenticationUtils->getLastAuthenticationError(false)) {
            $form->addError(new FormError($authenticationUtils->getLastAuthenticationError()->getMessage()));
        }

        return $connexionApiPresenter->present(new ConnexionApiResponder($form->createView()));
    }

}