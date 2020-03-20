<?php

namespace App\Controller;

use App\Factory\StatsFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Routing\Annotation\Route;

class StatsController extends AbstractController
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
        if($this->getUser()->getMember() === null || !$this->getUser()->getMember()->getIsLeader()) {
            throw new NotFoundHttpException();
        }

        $guild = $this->getUser()->getMember()->getGuild();

        return $this->render('stats/index.html.twig', [
            'isGuildStats' => true,
            'baseStats' => $statsFactory->getStats($guild),
        ]);
    }
}