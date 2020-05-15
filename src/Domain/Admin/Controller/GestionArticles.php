<?php


namespace App\Domain\Admin\Controller;


use App\Application\Entity\Article;
use App\Domain\Admin\Presenter\GestionArticlePresenterInterface;
use App\Domain\Admin\Responder\GestionArticlesResponder;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class GestionArticles
{

    /**
     * @IsGranted("ROLE_ADMIN")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param GestionArticlePresenterInterface $gestionArticlePresenter
     * @return Response
     */
    public function __invoke(Request $request,
                             EntityManagerInterface $entityManager,
                             GestionArticlePresenterInterface $gestionArticlePresenter): Response
    {
        $articles = $entityManager->getRepository(Article::class)->findAll();
        return $gestionArticlePresenter->present(new GestionArticlesResponder($articles));
    }

}