<?php


namespace App\Domain\Blog\Presenter;


use App\Domain\Blog\Responder\ReadArticlesResponder;
use App\Domain\Blog\Responder\RedirectReadArticlesResponder;
use App\Infrastructure\Presenter\AbstractPresenter;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class ReadArticlePresenter extends AbstractPresenter implements ReadArticlePresenterInterface
{

    public function present(ReadArticlesResponder $readArticleResponder): Response
    {
        return new Response($this->twig->render("blog/article.html.twig", [
            "formComment" => $readArticleResponder->getFormView(),
            "article" => $readArticleResponder->getItem(),
            "title" => "Article numéro {$readArticleResponder->getItem()->getId()}"
        ]));
    }

    /**
     * @param RedirectReadArticlesResponder $redirectReadArticleResponder
     * @param UrlGeneratorInterface $urlGenerator
     * @return RedirectResponse
     */
    public function redirect(RedirectReadArticlesResponder $redirectReadArticleResponder,
                             UrlGeneratorInterface $urlGenerator): RedirectResponse
    {
        return new RedirectResponse($urlGenerator->generate(
            "article_read",
            ["id" => $redirectReadArticleResponder->getArticle()->getId()])
        );
    }
}