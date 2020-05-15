<?php


namespace App\Domain\Admin\Controller;


use App\Application\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class DeleteArticles
{

    /**
     * @IsGranted("ROLE_ADMIN")
     * @param Request $request
     * @param Article $article
     * @param EntityManagerInterface $entityManager
     * @param UrlGeneratorInterface $urlGenerator
     * @return Response
     */
    public function __invoke(Request $request,
                             Article $article,
                             EntityManagerInterface $entityManager,
                             UrlGeneratorInterface $urlGenerator): Response
    {
        $entityManager->remove($article);
        $entityManager->flush();
        return new RedirectResponse($urlGenerator->generate("admin-gestion-articles"));
    }

}