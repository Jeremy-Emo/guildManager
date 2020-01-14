<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BoardController extends AbstractController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/tableau-de-bord", name="index", methods={"GET"})
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) : Response
    {
        return $this->render('board/index.html.twig', []);
    }
}