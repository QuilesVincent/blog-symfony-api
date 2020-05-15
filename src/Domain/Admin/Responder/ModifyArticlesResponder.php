<?php


namespace App\Domain\Admin\Responder;


use App\Application\Entity\Article;
use Symfony\Component\Form\FormView;

class ModifyArticlesResponder
{

    private Article $article;

    private FormView $formView;

    /**
     * ModifyArticlesResponder constructor.
     * @param Article $article
     * @param FormView $formView
     */
    public function __construct(Article $article, FormView $formView)
    {
        $this->article = $article;
        $this->formView = $formView;
    }

    /**
     * @return Article
     */
    public function getArticle(): Article
    {
        return $this->article;
    }

    /**
     * @return FormView
     */
    public function getFormView(): FormView
    {
        return $this->formView;
    }






}