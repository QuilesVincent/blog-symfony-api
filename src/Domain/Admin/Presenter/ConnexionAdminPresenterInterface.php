<?php


namespace App\Domain\Admin\Presenter;



use App\Domain\Admin\Responder\ConnexionAdminResponder;
use Symfony\Component\HttpFoundation\Response;

interface ConnexionAdminPresenterInterface
{
    public function present(ConnexionAdminResponder $connexionAdminResponder): Response;

}