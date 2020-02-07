<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\Type\GuildInfosType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

        $members = $this->getDoctrine()->getRepository(User::class)->getMembers($guild);

        return $this->render('guild/index.html.twig', [
            'guild' => $guild,
            'isGuildManagement' => true,
            'members' => $members,
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/guilde/infos", name="guild_manage_infos", methods={"GET", "POST"})
     * @param Request $request
     * @return Response
     */
    public function infos(Request $request) : Response
    {
        if($this->getUser()->getMember() === null || !$this->getUser()->getMember()->getIsLeader()) {
            throw new NotFoundHttpException();
        }

        $guild = $this->getUser()->getMember()->getGuild();

        $form = $this->createForm(GuildInfosType::class, $guild);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($guild);
            $em->flush();

            return $this->redirectToRoute('guild_manage_infos');
        }

        return $this->render('guild/infos.html.twig', [
            'guild' => $guild,
            'isGuildManagement' => true,
            'form' => $form->createView(),
        ]);
    }
}