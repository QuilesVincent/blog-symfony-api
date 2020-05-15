<?php


namespace App\Domain\Programme\Presenter;


use App\Domain\Programme\Responder\InscriptionProgrammeResponder;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

interface InscriptionProgrammePresenterInterface
{
    /**
     * @param InscriptionProgrammeResponder $inscriptionProgrammeResponder
     * @return Response
     */
    public function present(InscriptionProgrammeResponder $inscriptionProgrammeResponder): Response;

    /**
     * @param UrlGeneratorInterface $urlGenerator
     * @return RedirectResponse
     */
    public function redirect(UrlGeneratorInterface $urlGenerator): RedirectResponse;

}