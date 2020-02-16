<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ToolboxController extends AbstractController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/boite-a-outils", name="toolbox", methods={"GET"})
     * @return Response
     */
    public function index() : Response
    {
        return $this->render('toolbox/index.html.twig', [
            'isToolbox' => true,
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/boite-a-outils/bj5", name="toolbox_bj5", methods={"GET"})
     * @return Response
     */
    public function bj5() : Response
    {
        return $this->render('toolbox/bj5.html.twig', [
            'isToolbox' => true,
        ]);
    }
}