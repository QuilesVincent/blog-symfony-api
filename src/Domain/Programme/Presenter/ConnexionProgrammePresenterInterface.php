<?php


namespace App\Domain\Programme\Presenter;


use App\Domain\Programme\Responder\ConnexionProgrammeResponder;
use Symfony\Component\HttpFoundation\Response;

interface ConnexionProgrammePresenterInterface
{
    public function present(ConnexionProgrammeResponder $connexionProgrammeResponder): Response;

}