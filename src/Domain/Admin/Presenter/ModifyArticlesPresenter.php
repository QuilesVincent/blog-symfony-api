<?php


namespace App\Domain\Admin\Presenter;



use App\Domain\Admin\Responder\ModifyArticlesResponder;
use App\Infrastructure\Presenter\AbstractPresenter;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class ModifyArticlesPresenter extends AbstractPresenter implements ModifyArticlesPresenterInterface
{

    public function present(ModifyArticlesResponder $modifyArticlesResponder): Response
    {
        return new Response($this->twig->render("admin/modificationArticleSelected.html.twig", [
            "form" => $modifyArticlesResponder->getFormView(),
            "title" => "Modification de l'article numéro {$modifyArticlesResponder->getArticle()->getId()}",
        ]));
    }

    public function redirect(UrlGeneratorInterface $urlGenerator): RedirectResponse
    {
        return new RedirectResponse($urlGenerator->generate("admin-gestion-articles"));
    }


}