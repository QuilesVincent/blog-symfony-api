<?php


namespace App\Domain\Programme\Controller;


use App\Domain\Programme\Presenter\AccueilPresentationPresenterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AccueilPresentation
{

    /**
     * @param Request $request
     * @param AccueilPresentationPresenterInterface $accueilPresentationPresenter
     * @return Response
     */
    public function __invoke(Request $request,
                             AccueilPresentationPresenterInterface $accueilPresentationPresenter): Response
    {
        return $accueilPresentationPresenter->present();
    }

}