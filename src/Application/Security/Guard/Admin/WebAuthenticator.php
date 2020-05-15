<?php


namespace App\Application\Security\Guard\Admin;



use App\Domain\Admin\DataTransfertObject\Credentials;
use App\Domain\Admin\Form\UserType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;


/**
 * Class WebAuthenticator
 * @package App\Application\Security\Guard\Admin
 */
class WebAuthenticator extends AbstractFormLoginAuthenticator
{

    /**
     * @var UrlGeneratorInterface
     */
    private UrlGeneratorInterface $urlGenerator;

    private FormFactoryInterface $formFactory;

    private UserPasswordEncoderInterface $userPasswordEncoder;

    /**
     * WebAuthenticator constructor.
     * @param UrlGeneratorInterface $urlGenerator
     * @param FormFactoryInterface $formFactory
     * @param UserPasswordEncoderInterface $userPasswordEncoder
     */
    public function __construct(UrlGeneratorInterface $urlGenerator,
                                FormFactoryInterface $formFactory,
                                UserPasswordEncoderInterface $userPasswordEncoder
    )
    {
        $this->urlGenerator = $urlGenerator;
        $this->formFactory = $formFactory;
        $this->userPasswordEncoder = $userPasswordEncoder;
    }


    protected function getLoginUrl()
    {
        return $this->urlGenerator->generate("admin-connexion");
    }

    public function supports(Request $request)
    {
        return $request->isMethod(Request::METHOD_POST)
            &&  $request->attributes->get("_route") === "admin-connexion";
    }

    public function getCredentials(Request $request)
    {
        $credentials = new Credentials();
        $form = $this->formFactory->create(UserType::class, $credentials)->handleRequest($request);

        if (!$form->isValid()) {
            return;
        }
        return $credentials;
    }

    /**
     * @param Credentials $credentials
     * @param UserProviderInterface $userProvider
     * @return UserInterface|void|null
     */
    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        return $userProvider->loadUserByUsername($credentials->getUsername());
    }

    /**
     * @param Credentials $credentials
     * @param UserInterface $user
     * @return bool
     */
    public function checkCredentials($credentials, UserInterface $user)
    {
        return $this->userPasswordEncoder->isPasswordValid($user, $credentials->getPassword());
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $providerKey)
    {
        return new RedirectResponse($this->urlGenerator->generate("admin-gestion-articles"));
    }
}