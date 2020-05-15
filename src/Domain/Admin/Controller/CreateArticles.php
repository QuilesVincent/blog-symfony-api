<?php


namespace App\Domain\Admin\Controller;


use App\Application\Entity\Article;
use App\Domain\Admin\Handler\ArticleHandler;
use App\Domain\Admin\Presenter\CreateArticlesPresenterInterface;
use App\Domain\Admin\Responder\CreateArticlesResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class CreateArticles
{


    /**
     * @IsGranted("ROLE_ADMIN")
     * @param Request $request
     * @param ArticleHandler $articleHandler
     * @param UrlGeneratorInterface $urlGenerator
     * @param CreateArticlesPresenterInterface $createArticlesPresenter
     * @return Response
     */
    public function __invoke(Request $request,
                             ArticleHandler $articleHandler,
                             UrlGeneratorInterface $urlGenerator,
                             CreateArticlesPresenterInterface $createArticlesPresenter): Response
    {
        $article = new Article();

        $options = [
            "validation_groups" => ["Default" => "create"]
        ];

        if($articleHandler->handle($request, $article, $options)) {
            return $createArticlesPresenter->redirect();
        }

        return $createArticlesPresenter->present(new CreateArticlesResponder($articleHandler->createView()));
    }

}