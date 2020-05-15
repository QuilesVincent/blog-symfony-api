<?php


namespace App\Domain\Admin\Responder;

use Symfony\Component\Form\FormView;

class ConnexionAdminResponder
{

    private FormView $formView;

    /**
     * ConnexionAdminResponder constructor.
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