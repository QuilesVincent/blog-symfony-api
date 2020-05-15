<?php


namespace App\Infrastructure\Presenter;


use Twig\Environment;

abstract class AbstractPresenter
{
    protected Environment $twig;

    /**
     * AbstractPresenter constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

}