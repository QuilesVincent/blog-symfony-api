<?php


namespace App\Domain\Api\Presenter;


use App\Application\Entity\TokenApi;
use App\Infrastructure\Presenter\AbstractPresenter;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Security\Core\User\UserInterface;

class CreateTokenPresenter extends AbstractPresenter implements CreateTokenPresenterInterface
{

    /**
     * @param TokenApi $tokenApi
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function present(TokenApi $tokenApi): Response
    {
        return new Response($this->twig->render("api/createToken.html.twig", [
            "token" => $tokenApi,
            "title" => "the token"
        ]));
    }
}