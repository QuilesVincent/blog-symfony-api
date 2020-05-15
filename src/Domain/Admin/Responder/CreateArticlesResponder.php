<?php


namespace App\Domain\Admin\Responder;



use Symfony\Component\Form\FormView;

class CreateArticlesResponder
{
    private FormView $formView;

    /**
     * CreateArticlesResponder constructor.
     * @param FormView $formView
     */
    public function __construct(FormView $formView)
    {
        $this->formView = $formView;
    }

    /**
     * @return FormView
     */
    public function getFormView(): FormView
    {
        return $this->formView;
    }



}