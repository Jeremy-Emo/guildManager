<?php

namespace App\Controller;

use App\Form\Type\GuildContentType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BoardController extends AbstractController
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

        }
        return $this->render('board/index.html.twig', [
            'memberInfos' => $this->getUser()->getMember(),
            'formGuild' => isset($formGuild) ? $formGuild->createView() : null,
            'guildInfos' => $guild ?? null,
            'isDashboard' => true,
        ]);
    }
}