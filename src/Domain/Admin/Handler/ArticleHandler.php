<?php


namespace App\Domain\Admin\Handler;

use App\Domain\Admin\DataTransfertObject\Article;
use App\Domain\Admin\Form\ArticleType;
use App\Infrastructure\Handler\AbstractHandler;
use App\Infrastructure\Uploader\UploaderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\UnitOfWork;

/**
 * Class ArticleHandler
 * @package App\Handler
 */
class ArticleHandler extends AbstractHandler
{

    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    private UploaderInterface $uploaderInterface;

    /**
     * CommentHandler constructor.
     * @param EntityManagerInterface $entityManager
     * @param UploaderInterface $uploaderInterface
     */
    public function __construct(EntityManagerInterface $entityManager, UploaderInterface $uploaderInterface)
    {
        $this->entityManager = $entityManager;
        $this->uploaderInterface = $uploaderInterface;
    }

    protected function process($data): void
    {

        $file = $this->form->get("file")->getData();

        if ($file !== null) {
            if (is_array($file)) {
                $this->uploaderInterface->multipleUpload($file);
            } else {
                $this->uploaderInterface->upload($file);
            }
        }

        if ($this->entityManager->getUnitOfWork()->getEntityState($data) === UnitOfWork::STATE_NEW) {
            $this->entityManager->persist($data);
        }

        $this->entityManager->flush();
    }

    protected function getFormType(): string
    {
        return ArticleType::class;
    }

    protected function getDataTransfertObject(): object
    {
        return new Article();
    }

}