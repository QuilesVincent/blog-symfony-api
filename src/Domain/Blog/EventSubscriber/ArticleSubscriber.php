<?php


namespace App\Domain\Blog\EventSubscriber;


use App\Application\Entity\Article;
use App\Infrastructure\Event\ReverseEvent;
use App\Infrastructure\Event\TransfertEvent;
use App\Infrastructure\Uploader\UploaderInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Security;

class ArticleSubscriber implements EventSubscriberInterface
{

    /**
     * @var Security
     */
    private Security $security;

    private UploaderInterface $uploader;

    /**
     * ArticleSubscriber constructor.
     * @param Security $security
     * @param UploaderInterface $uploader
     */
    public function __construct(Security $security, UploaderInterface $uploader)
    {
        $this->security = $security;
        $this->uploader = $uploader;
    }


    public static function getSubscribedEvents()
    {
        return [
            TransfertEvent::NAME => "onTransfert",
            ReverseEvent::NAME => "onReverse"
        ];
    }


    public function onTransfert(TransfertEvent $event): void
    {
        if(!$event->getOriginalData() instanceof Article) {
            return;
        }
        $event->getData()->setContent($event->getOriginalData()->getContent());
        $event->getData()->setTitle($event->getOriginalData()->getTitle());
        $event->getData()->setTitlePicture($event->getOriginalData()->getTitlePicture());
        $event->getData()->setCategory($event->getOriginalData()->getCategory());
        $event->getData()->setIntroduction($event->getOriginalData()->getIntroduction());

    }

    public function onReverse(ReverseEvent $event): void
    {
        if(!$event->getOriginalData() instanceof Article) {
            return;
        }

        $event->getOriginalData()->setContent($event->getData()->getContent());
        $event->getOriginalData()->setTitle($event->getData()->getTitle());
        $event->getOriginalData()->setTitlePicture($event->getData()->getTitlePicture());
        $event->getOriginalData()->setCategory($event->getData()->getCategory());
        $event->getOriginalData()->setIntroduction($event->getData()->getIntroduction());

    }


}