<?php


namespace App\Domain\Admin\Presenter;


use App\Domain\Admin\Responder\CreateArticlesResponder;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

interface CreateArticlesPresenterInterface
{
    /**
     * @param CreateArticlesResponder $createArticlesResponder
     * @return Response
     */
    public function present(CreateArticlesResponder $createArticlesResponder): Response;

    /**
     * @param UrlGeneratorInterface $urlGenerator
     * @return RedirectResponse
     */
    public function redirect(UrlGeneratorInterface $urlGenerator): RedirectResponse;


}