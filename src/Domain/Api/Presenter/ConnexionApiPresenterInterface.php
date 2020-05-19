<?php


namespace App\Domain\Api\Presenter;


use App\Application\Entity\TokenApi;
use App\Domain\Api\Responder\ConnexionApiResponder;
use Symfony\Component\HttpFoundation\Response;

interface ConnexionApiPresenterInterface
{
    /**
     * @param ConnexionApiResponder $connexionApiResponder
     * @param TokenApi|null $tokenApi
     * @return Response
     */
    public function present(ConnexionApiResponder $connexionApiResponder, ?TokenApi $tokenApi = null): Response;

}