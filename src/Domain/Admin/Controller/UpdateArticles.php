<?php


namespace App\Domain\Admin\Controller;


use App\Application\Entity\Article;
use App\Domain\Admin\Handler\ArticleHandler;
use App\Domain\Admin\Presenter\ModifyArticlesPresenterInterface;
use App\Domain\Admin\Responder\ModifyArticlesResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class UpdateArticles
{

    /**
     * @IsGranted("ROLE_ADMIN")
     * @param Article $article
     * @param Request $request
     * @param ArticleHandler $articleHandler
     * @param ModifyArticlesPresenterInterface $modifyArticlesPresenter
     * @return Response
     */
    public function __invoke(Article $article,
                             Request $request,
                             ArticleHandler $articleHandler,
                             ModifyArticlesPresenterInterface $modifyArticlesPresenter): Response
    {
        if($articleHandler->handle($request, $article)) {
            return $modifyArticlesPresenter->redirect();
        }

        return $modifyArticlesPresenter->present(new ModifyArticlesResponder($article, $articleHandler->createView()));
    }

}