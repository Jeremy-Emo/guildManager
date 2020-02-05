<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class GuildController extends AbstractController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/guilde/gestion", name="guild_management", methods={"GET", "POST"})
     * @return Response
     */
    public function index() : Response
    {
        if($this->getUser()->getMember() === null || !$this->getUser()->getMember()->getIsLeader()) {
            throw new NotFoundHttpException();
        }

        $guild = $this->getUser()->getMember()->getGuild();

        return $this->render('guild/index.html.twig', [
            'guild' => $guild,
        ]);
    }
}