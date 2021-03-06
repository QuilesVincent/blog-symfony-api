<?php


namespace App\Application\Security\Guard\Api;


use App\Application\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;

class TokenAuthenticator extends AbstractGuardAuthenticator
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function start(Request $request, AuthenticationException $authException = null)
    {
        $data = ["message", "Authentication Required"];

        return new JsonResponse($data, Response::HTTP_UNAUTHORIZED);
    }

    public function supports(Request $request)
    {
        return $request->headers->has("X-AUTH-TOKEN");
    }

    public function getCredentials(Request $request)
    {
        if (!$token = $request->headers->get("X-AUTH-TOKEN")) {
            $token = null;
        }

        return ["token" => $token];
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $apiKey = $credentials["token"];

        if (null === $apiKey) {
            return;
        }

        return $this->entityManager->getRepository(User::class)
            ->findOneBy(["apiKey" => $credentials]);
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        return true;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        $data = ["message" => strtr($exception->getMessage(), $exception->getMessageData())];

        return new JsonResponse($data, Response::HTTP_FORBIDDEN);
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $providerKey)
    {
        return null;
    }

    public function supportsRememberMe()
    {
        return false;
    }
}