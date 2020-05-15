<?php


namespace App\Domain\Programme\Presenter;


use Symfony\Component\HttpFoundation\Response;

interface FirstPagePresenterInterface
{

    public function present(): Response;

}