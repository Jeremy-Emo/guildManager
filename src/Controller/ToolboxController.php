<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ToolboxController extends GenericController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/boite-a-outils", name="toolbox", methods={"GET"})
     * @return Response
     */
    public function index() : Response
    {
        return $this->render('toolbox/index.html.twig', []);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/boite-a-outils/bj5", name="toolbox_bj5", methods={"GET"})
     * @return Response
     */
    public function bj5() : Response
    {
        return $this->render('toolbox/bj5.html.twig', []);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/boite-a-outils/batiments", name="toolbox_buildings", methods={"GET"})
     * @return Response
     */
    public function buildings() : Response
    {
        return $this->render('toolbox/buildings.html.twig', []);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/boite-a-outils/gvo-time", name="toolbox_gvo_time", methods={"GET"})
     * @return Response
     */
    public function gvoTime() : Response
    {
        return $this->render('toolbox/gvoTime.html.twig', []);
    }
}