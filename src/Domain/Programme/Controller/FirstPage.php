<?php


namespace App\Domain\Programme\Controller;


use App\Domain\Programme\Presenter\FirstPagePresenterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FirstPage
{

    /**
     * @param Request $request
     * @param FirstPagePresenterInterface $firstPagePresenter
     * @return Response
     */
    public function __invoke(Request $request,
                             FirstPagePresenterInterface $firstPagePresenter): Response
    {
        return $firstPagePresenter->present();
    }


}