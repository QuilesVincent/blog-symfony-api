<?php


namespace App\Domain\Api\Controller;


use App\Application\Entity\TokenApi;
use App\Domain\Admin\DataTransfertObject\Credentials;
use App\Domain\Admin\Form\UserType;
use App\Domain\Api\Presenter\CreateTokenPresenterInterface;
use App\Domain\Api\Responder\CreateTokenResponder;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Serializer\SerializerInterface;

class CreateToken extends AbstractApiController
{

    /**
     * @var Security
     */
    private Security $security;

    /**
     * CreateToken constructor.
     * @param SerializerInterface $serializer
     * @param EventDispatcherInterface $eventDispatcher
     * @param Security $security
     */
    public function __construct(SerializerInterface $serializer,
                                EventDispatcherInterface $eventDispatcher,
                                Security $security)
    {
        parent::__construct($serializer, $eventDispatcher);
        $this->security = $security;
    }

    /**
     * @param Request $request
     * @param CreateTokenPresenterInterface $createTokenPresenter
     * @param EntityManagerInterface $entityManager
     * @return Response
     * @throws \Exception
     */
    public function __invoke(Request $request,
                             CreateTokenPresenterInterface $createTokenPresenter,
                             EntityManagerInterface $entityManager): Response
    {
        $user = $this->security->getUser();
        $tabl = [];
        if (isset($user)) {
            if(empty($user->getApiKey()->getValues())) {
                $token = new TokenApi();
                $token->setValue(base64_encode(random_bytes(50)));
                $token->setCreatedAt();
                $token->setUser($user);
                $entityManager->persist($token);
                $entityManager->flush();
            } else {
                $token = $user->getApiKey()->first();
            }
        } else {
            return new Response("il faut se connecter avant");
        }


        return $createTokenPresenter->present($token);


    }

}