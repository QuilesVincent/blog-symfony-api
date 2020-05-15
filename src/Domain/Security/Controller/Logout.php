<?php


namespace App\Domain\Security\Controller;


use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class Logout
{
    /**
     * @var Environment
     */
    private Environment $twig;

    /**
     * SecurityController constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @Route("/logOut", name="security_logOut")
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function __invoke(): Response
    {
        return new Response($this->twig->render("blog/index.html.twig", [
            "title" => "index"
        ]));

    }

}