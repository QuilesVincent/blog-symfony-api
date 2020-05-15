<?php


namespace App\Domain\Blog\Handler;



use App\Domain\Blog\DataTransfertObject\Comment;
use App\Domain\Blog\Form\CommentType;
use App\Infrastructure\Handler\AbstractHandler;
use Doctrine\ORM\EntityManagerInterface;

class CommentHandler extends AbstractHandler
{

    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    /**
     * CommentHandler constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    protected function process($data): void
    {
        $this->entityManager->persist($data);
        $this->entityManager->flush();
    }

    protected function getFormType(): string
    {
        return CommentType::class;
    }

    protected function getDataTransfertObject(): object
    {
        return new Comment();
    }


}