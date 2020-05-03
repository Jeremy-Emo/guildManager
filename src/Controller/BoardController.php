<?php

namespace App\Controller;

use App\Entity\Achievement;
use App\Entity\AchievementsCategory;
use App\Entity\Event;
use App\Entity\User;
use App\Form\Type\GuildContentType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BoardController extends GenericController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/tableau-de-bord", name="index", methods={"GET", "POST"})
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) : Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        if($this->getUser()->getMember() !== null) {

            //Formulaire inscription contenus de guilde
            $formGuild = $this->createForm(GuildContentType::class, $this->getUser()->getMember());
            $formGuild->handleRequest($request);
            if($formGuild->isSubmitted() && $formGuild->isValid()) {
                $entityManager->persist($this->getUser()->getMember());
                $entityManager->flush();
                $this->redirectToRoute('index');
            }

            $guild = $this->getUser()->getMember()->getGuild();

            if($this->getUser()->getMember()->getIsLeader()){
                $membersInValidation = $this->getDoctrine()->getRepository(User::class)->getMembersInValidation($this->getUser()->getMember()->getGuild());
            }

        }

        $events = $this->getDoctrine()->getRepository(Event::class)->findAll();

        $hfs = $this->getDoctrine()->getRepository(Achievement::class)->getWhereNoCategory();
        $hfsCat = $this->getDoctrine()->getRepository(AchievementsCategory::class)->findAll();

        return $this->render('board/index.html.twig', [
            'memberInfos' => $this->getUser()->getMember(),
            'formGuild' => isset($formGuild) ? $formGuild->createView() : null,
            'guildInfos' => $guild ?? null,
            'isDashboard' => true,
            'events' => $events,
            'hfs' => $hfs,
            'hfsCat' => $hfsCat,
            'membersInValidation' => $membersInValidation ?? null,
        ]);
    }
}