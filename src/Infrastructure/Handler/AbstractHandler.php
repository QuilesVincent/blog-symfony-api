<?php


namespace App\Infrastructure\Handler;



use App\Infrastructure\Event\ReverseEvent;
use App\Infrastructure\Event\TransfertEvent;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

/**
 * Class AbstractHandler
 * @package App\Infrastructure\Handler
 */
abstract class AbstractHandler implements HandlerInterface
{

    private EventDispatcherInterface $eventDispatcher;

    private FormFactoryInterface $formFactory;

    protected FormInterface $form;

    /**
     * @return object
     */
    abstract protected function getDataTransfertObject(): object;

    abstract protected function process($data): void;

    /**
     * @return string
     */
    abstract protected function getFormType(): string;

    /**
     * @required
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function setEventDispatcher(EventDispatcherInterface $eventDispatcher): void
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @required
     * @param FormFactoryInterface $formFactory
     */
    public function setFormFactory(FormFactoryInterface $formFactory): void
    {
        $this->formFactory = $formFactory;
    }



    public function handle(Request $request, object $originalData, array $options = []): bool
    {
        $data = $this->getDataTransfertObject();

        //Peut être mettre une condition ici, pour n'appeler que le bon suscriber
        $this->eventDispatcher->dispatch(new TransfertEvent($originalData, $data), TransfertEvent::NAME);

        $this->form = $this->formFactory->create($this->getFormType(), $data, $options)->handleRequest($request);

        if ($this->form->isSubmitted() && $this->form->isValid()) {
            $this->eventDispatcher->dispatch(new ReverseEvent($data, $originalData), ReverseEvent::NAME);
            $this->process($originalData);
            return true;
        }

        return false;
    }

    public function createView(): FormView
    {
        return $this->form->createView();
    }


}