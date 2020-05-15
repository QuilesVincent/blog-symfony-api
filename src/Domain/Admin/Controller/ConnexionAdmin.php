<?php


namespace App\Domain\Admin\Controller;


use App\Domain\Admin\DataTransfertObject\Credentials;
use App\Domain\Admin\Form\UserType;
use App\Domain\Admin\Presenter\ConnexionAdminPresenterInterface;
use App\Domain\Admin\Responder\ConnexionAdminResponder;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class ConnexionAdmin
{

    /**
     * @param Request $request
     * @param AuthenticationUtils $authenticationUtils
     * @param FormFactoryInterface $formFactory
     * @param ConnexionAdminPresenterInterface $connexionAdminPresenter
     * @return Response
     */
    public function __invoke(Request $request,
                             AuthenticationUtils $authenticationUtils,
                             FormFactoryInterface $formFactory,
                             ConnexionAdminPresenterInterface $connexionAdminPresenter): Response
    {
        $form = $formFactory->create(UserType::class, new Credentials($authenticationUtils->getLastUsername()))->handleRequest($request);
        if (null !== $authenticationUtils->getLastAuthenticationError(false)) {
            $form->addError(new FormError($authenticationUtils->getLastAuthenticationError()->getMessage()));
        }

        return $connexionAdminPresenter->present(new ConnexionAdminResponder($form->createView()));
    }

}