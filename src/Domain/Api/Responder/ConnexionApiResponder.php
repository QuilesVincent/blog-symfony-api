<?php


namespace App\Domain\Api\Responder;


use Symfony\Component\Form\FormView;

class ConnexionApiResponder
{
    private FormView $formView;

    /**
     * CreateTokenResponder constructor.
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