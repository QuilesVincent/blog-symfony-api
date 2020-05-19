<?php


namespace App\Domain\Api\Presenter;


use App\Application\Entity\TokenApi;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;

interface CreateTokenPresenterInterface
{
    /**
     * @param TokenApi $tokenApi
     * @return Response
     */
    public function present(TokenApi $tokenApi): Response;

}