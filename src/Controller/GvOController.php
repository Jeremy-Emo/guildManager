<?php

namespace App\Controller;

use App\Entity\Defense;
use App\Entity\EnemyGuild;
use App\Entity\Siege;
use App\Form\Type\EnemyGuildType;
use App\Form\Type\SiegeInfosType;
use App\Form\Type\SiegeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class GvOController extends GenericController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/gvo/guildes", name="enemy_guilds", methods={"GET"})
     * @return Response
     */
    public function index() : Response
    {
        $guilds = $this->getDoctrine()->getRepository(EnemyGuild::class)->findAll();

        return $this->render('gvo/index.html.twig', [
            'leader' => $this->getUser()->getMember()->getIsLeader(),
            'guilds' => $guilds,
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/gvo/guilde/defenses/{id}", name="enemy_guild_defenses", methods={"GET"})
     * @param int $id
     * @return Response
     */
    public function viewGuildDefenses(int $id) : Response
    {
        $guilds = $this->getDoctrine()->getRepository(EnemyGuild::class)->findAll();
        $enemyGuild = $this->getDoctrine()->getRepository(EnemyGuild::class)->find($id);

        if($enemyGuild === null){
            throw new NotFoundHttpException();
        }

        $defenses = $this->getDoctrine()->getRepository(Defense::class)->findBy([
            'enemyGuild' => $enemyGuild
        ]);

        return $this->render('gvo/index.html.twig', [
            'leader' => $this->getUser()->getMember()->getIsLeader(),
            'guilds' => $guilds,
            'defenses' => $defenses,
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/gvo/ajouter-guilde-ennemie", name="add_enemy_guild", methods={"GET", "POST"})
     * @param Request $request
     * @return Response
     */
    public function add(Request $request) : Response
    {
        $this->checkLeader();

        $eg = new EnemyGuild();
        $form = $this->createForm(EnemyGuildType::class, $eg);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($eg);
            $em->flush();

            return $this->redirectToRoute('enemy_guilds');
        }

        return $this->render('gvo/add.html.twig', [
            'leader' => $this->getIfLeaderOrAdmin(),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/gvo/sieges", name="sieges", methods={"GET"})
     * @return Response
     */
    public function sieges() : Response
    {
        if($this->getUser()->getMember() === null) {
            throw new NotFoundHttpException();
        }

        $sieges = $this->getDoctrine()->getRepository(Siege::class)->findBy([
            'guild' => $this->getUser()->getMember()->getGuild()
        ]);

        return $this->render('gvo/sieges.html.twig', [
            'leader' => $this->getUser()->getMember()->getIsLeader(),
            'sieges' => $sieges,
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/gvo/ajouter-siege", name="add_siege", methods={"GET", "POST"})
     * @param Request $request
     * @return Response
     */
    public function addSiege(Request $request) : Response
    {
        $this->checkLeader();

        $siege = new Siege();
        $form = $this->createForm(SiegeType::class, $siege);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $siege->setGuild($this->getUser()->getMember()->getGuild());
            $em->persist($siege);
            $em->flush();

            return $this->redirectToRoute('sieges');
        }

        return $this->render('gvo/addSiege.html.twig', [
            'leader' => $this->getIfLeaderOrAdmin(),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/gvo/voir-siege/{id}", name="edit_siege", methods={"GET", "POST"})
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function viewSiege(Request $request, int $id) : Response
    {
        $siege = $this->getDoctrine()->getRepository(Siege::class)->find($id);
        if($siege === null){
            throw new NotFoundHttpException();
        }

        if($this->getIfLeaderOrAdmin()){
            $form = $this->createForm(SiegeInfosType::class, $siege);
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($siege);
                $em->flush();

                return $this->redirectToRoute('sieges');
            }
        }

        return $this->render('gvo/siegeInfo.html.twig', [
            'leader' => $this->getIfLeaderOrAdmin(),
            'form' => isset($form) ? $form->createView() : null,
            'siege' => $siege,
        ]);
    }
}