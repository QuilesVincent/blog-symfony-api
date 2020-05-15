<?php


namespace App\Domain\Blog\Presenter;


use App\Domain\Blog\Responder\ReadArticlesResponder;
use App\Domain\Blog\Responder\RedirectReadArticlesResponder;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

interface ReadArticlePresenterInterface
{

    /**
     * @param ReadArticlesResponder $readArticleResponder
     * @return Response
     */
    public function present(ReadArticlesResponder $readArticleResponder): Response;

    /**
     * @param RedirectReadArticlesResponder $redirectReadArticleResponder
     * @param UrlGeneratorInterface $urlGenerator
     * @return RedirectResponse
     */
    public function redirect(RedirectReadArticlesResponder $redirectReadArticleResponder,
                             UrlGeneratorInterface $urlGenerator): RedirectResponse;

}