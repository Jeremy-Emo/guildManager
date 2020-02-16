<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefensesController extends AbstractController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/defenses-gvo", name="gvo_defs", methods={"GET"})
     * @return Response
     */
    public function index() : Response
    {
        return $this->render('defenses/index.html.twig', []);
    }
}