<?php


namespace App\Domain\Programme\Presenter;


use Symfony\Component\HttpFoundation\Response;

interface AccueilPresentationPresenterInterface
{

    public function present(): Response;

}