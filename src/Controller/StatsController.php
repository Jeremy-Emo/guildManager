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
        $this->checkMemberOfGuild();

        $guild = $this->getUser()->getMember()->getGuild();
        $critical = $guild->getGvgCritical() ?? 20;
        $warning = $guild->getGvgWarning() ?? 25;

        $form = $this->createForm(SelectTimeType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $week = $form->get('week')->getData()->format("W");
            $year = $form->get('week')->getData()->format("Y");
            $scores = $this->getDoctrine()->getRepository(GvGScores::class)->getScoresForWeekAndGuild($week, $year, $guild);
            $users = [];
            $users['critical'] = [];
            $users['warning'] = [];
            foreach($scores as $score){
                if($score->getAttackNumber() < $critical){
                    $users['critical'][] = $score->getUser()->getUser();
                } else if($score->getAttackNumber() < $warning) {
                    $users['warning'][] = $score->getUser()->getUser();
                }
            }
        }

        return $this->render('stats/index.html.twig', [
            'baseStats' => $statsFactory->getStats($guild),
            'form' => $form->createView(),
            'users' => $users ?? null,
            'critical' => $critical,
            'warning' => $warning,
        ]);
    }
}