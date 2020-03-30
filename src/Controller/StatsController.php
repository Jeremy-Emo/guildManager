<?php

namespace App\Controller;

use App\Entity\GvGScores;
use App\Factory\StatsFactory;
use App\Form\Type\SelectTimeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Routing\Annotation\Route;

class StatsController extends GenericController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/guilde/statistiques", name="guild_stats", methods={"GET", "POST"})
     * @param Request $request
     * @param StatsFactory $statsFactory
     * @return Response
     */
    public function index(Request $request, StatsFactory $statsFactory) : Response
    {
        $this->checkLeader();

        $guild = $this->getUser()->getMember()->getGuild();

        $form = $this->createForm(SelectTimeType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $week = $form->get('week')->getData()->format("W");
            $scores = $this->getDoctrine()->getRepository(GvGScores::class)->findBy([
                'semaine' => $week,
            ]);
            $users = [];
            foreach($scores as $score){
                if($score->getAttackNumber() < 20){
                    $users['critical'][] = $score->getUser()->getUser();
                } else if($score->getAttackNumber() < 25) {
                    $users['warning'][] = $score->getUser()->getUser();
                }
            }
        }

        return $this->render('stats/index.html.twig', [
            'isGuildStats' => true,
            'baseStats' => $statsFactory->getStats($guild),
            'form' => $form->createView(),
            'users' => $users ?? null,
        ]);
    }
}