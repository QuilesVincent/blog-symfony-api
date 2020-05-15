<?php


namespace App\Domain\Admin\Presenter;


use App\Domain\Admin\Responder\CreateArticlesResponder;
use App\Infrastructure\Presenter\AbstractPresenter;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class CreateArticlesPresenter extends AbstractPresenter implements CreateArticlesPresenterInterface
{

    public function present(CreateArticlesResponder $createArticlesResponder): Response
    {
        return new Response($this->twig->render("admin/creationArticle.html.twig", [
            "form" => $createArticlesResponder->getFormView(),
            "title" => "Création d'articles",
        ]));
    }

    public function redirect(UrlGeneratorInterface $urlGenerator): RedirectResponse
    {
        return new RedirectResponse($urlGenerator->generate("admin-gestion-articles"));
    }
}