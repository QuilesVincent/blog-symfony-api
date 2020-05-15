<?php


namespace App\Domain\Blog\Responder;

use App\Application\Entity\Article;
use Symfony\Component\Form\FormView;

/**
 * Class ReadArticlesResponder
 * @package App\Domain\Blog\Responder
 */
class ReadArticlesResponder
{

    /**
     * @var Article
     */
    private Article $item;

    /**
     * @var FormView
     */
    private FormView $formView;

    /**
     * ReadArticlesResponder constructor.
     * @param Article $item
     * @param FormView $formView
     */
    public function __construct(Article $item, FormView $formView)
    {
        $this->item = $item;
        $this->formView = $formView;
    }

    /**
     * @return Article
     */
    public function getItem(): Article
    {
        return $this->item;
    }

    /**
     * @return FormView
     */
    public function getFormView(): FormView
    {
        return $this->formView;
    }

}