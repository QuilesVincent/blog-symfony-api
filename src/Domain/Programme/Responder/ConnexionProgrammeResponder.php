<?php


namespace App\Domain\Programme\Responder;


use Symfony\Component\Form\FormView;

class ConnexionProgrammeResponder
{
    private FormView $formView;

    /**
     * ConnexionProgrammeResponder constructor.
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