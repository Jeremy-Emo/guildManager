<?php

namespace App\Controller;

use App\Entity\Defense;
use App\Entity\EnemyGuild;
use App\Form\Type\EnemyGuildType;
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
            'isGuildGVO' => true,
            'leader' => ($this->getUser()->getMember()->getIsLeader() || $this->getUser()->getIsAdmin()),
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
            'isGuildGVO' => true,
            'leader' => ($this->getUser()->getMember()->getIsLeader() || $this->getUser()->getIsAdmin()),
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
        if($this->getUser()->getMember() === null || !$this->getUser()->getMember()->getIsLeader()) {
            throw new NotFoundHttpException();
        }

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
            'isGuildGVO' => true,
            'leader' => ($this->getUser()->getMember()->getIsLeader() || $this->getUser()->getIsAdmin()),
            'form' => $form->createView(),
        ]);
    }
}