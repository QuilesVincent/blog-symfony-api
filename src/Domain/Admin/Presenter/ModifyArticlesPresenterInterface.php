<?php


namespace App\Domain\Admin\Presenter;


use App\Domain\Admin\Responder\ModifyArticlesResponder;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

interface ModifyArticlesPresenterInterface
{

    /**
     * @param ModifyArticlesResponder $modifyArticlesResponder
     * @return Response
     */
    public function present(ModifyArticlesResponder $modifyArticlesResponder): Response;

    /**
     * @param UrlGeneratorInterface $urlGenerator
     * @return RedirectResponse
     */
    public function redirect(UrlGeneratorInterface $urlGenerator): RedirectResponse;

}