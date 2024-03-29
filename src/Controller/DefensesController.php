<?php

namespace App\Controller;

use App\Entity\Defense;
use App\Entity\EnemyGuild;
use App\Entity\Monster;
use App\Entity\User;
use App\Form\Type\DefenseEnemyType;
use App\Form\Type\DefenseGuildmateType;
use App\Form\Type\DefenseType;
use Doctrine\ORM\EntityRepository;
use Exception;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class DefensesController extends GenericController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/mes-defenses-gvo", name="gvo_defs", methods={"GET"})
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) : Response
    {
        $defRepo = $this->getDoctrine()->getRepository(Defense::class);

        $myDefenses = $defRepo->findBy([
            'owner' => $this->getUser(),
        ]);

        return $this->render('defenses/index.html.twig', [
            'myDefenses' => $myDefenses,
            'winrate' => $winrate ?? null,
        ]);
    }
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/aide-aux-defenses-gvo", name="gvo_defs_help", methods={"GET"})
     * @param Request $request
     * @return Response
     */
    public function help(Request $request) : Response
    {
        $defRepo = $this->getDoctrine()->getRepository(Defense::class);

        $form = $this->createFormBuilder()
            ->setMethod('GET')
            ->add('search', EntityType::class, [
                'class' => Monster::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('m')
                        ->orderBy('m.name', 'ASC');
                },
                'expanded' => false,
                'multiple' => true,
            ])
            ->getForm()
        ;
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $results = $defRepo->getDefensesWhereIsMob($form->get('search')->getData());
            $victories = 0;
            $fights = 0;
            foreach($results as $result){
                $victories += $result->getVictories();
                $fights += $result->getTotalFights();
            }
            if($results !== null && $fights !== 0){
                $winrate = $victories / $fights * 100;
            }
        }

        return $this->render('defenses/help.html.twig', [
            'form' => $form->createView(),
            'results' => $results ?? null,
            'winrate' => $winrate ?? null,
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/nouvelle-defense-gvo", name="gvo_def_new", methods={"GET", "POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request) : Response
    {
        $defense = new Defense();

        $form = $this->createForm(DefenseType::class, $defense);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $defense
                ->setOwner($this->getUser())
                ->setVictories(0)
                ->setLoses(0)
            ;

            $em = $this->getDoctrine()->getManager();
            $em->persist($defense);
            $em->flush();

            return $this->redirectToRoute('gvo_defs');
        }

        return $this->render('defenses/new.html.twig', [
            'isGVO' => true,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/supprimer-defense-gvo/{id}", name="gvo_def_delete", methods={"GET"})
     * @param int $id
     * @return Response
     */
    public function delete(int $id) : Response
    {
        $defense = $this->getDoctrine()->getRepository(Defense::class)->findOneBy([
            'id' => $id,
            'owner' => $this->getUser(),
        ]);

        if($defense === null){
            throw new NotFoundHttpException();
        }

        $em = $this->getDoctrine()->getManager();

        if(( $defense->getVictories() + $defense->getLoses() ) < 10) {
            $em->remove($defense);
        } else {
            $defense->setOwner(null)->setDetail("Ancienne défense de la guilde");
            $em->persist($defense);
        }

        $em->flush();

        return $this->redirectToRoute('gvo_defs');
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/modifier-score-gvo", name="gvo_def_score_mod", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function changeScores(Request $request) : Response
    {
        if($request->isXmlHttpRequest()){

            $id = $request->request->get('id');
            $score = $request->request->get('score');
            $isVictories = ($request->request->get('isVictories') === 'true' ? true : false);

            if($score === null || $id === null || $score === '' || $id === '') {
                throw new NotFoundHttpException();
            }

            $defense = $this->getDoctrine()->getRepository(Defense::class)->find($id);

            if($isVictories){
                $defense->setVictories($score);
            } else {
                $defense->setLoses($score);
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($defense);
            $em->flush();

            return new JsonResponse([
                "success" => true,
            ]);
        } else {
            throw new NotFoundHttpException();
        }
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/ajouter-defense-gvo/{id}", name="add_defense", methods={"GET", "POST"})
     * @param Request $request
     * @param int $id
     * @return Response
     * @throws Exception
     */
    public function add(Request $request, int $id) : Response
    {
        $this->checkLeader();

        $guild = $this->getDoctrine()->getRepository(EnemyGuild::class)->find($id);
        if($guild === null) {
            throw new NotFoundHttpException();
        }

        $defense = new Defense();

        $form = $this->createForm(DefenseEnemyType::class, $defense);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $defense->setEnemyGuild($guild);
            $em = $this->getDoctrine()->getManager();
            $em->persist($defense);

            $em->flush();

            return $this->redirectToRoute('enemy_guilds');
        }

        return $this->render('defenses/new.html.twig', [
            'isGVO' => true,
            'form' => $form->createView(),
            'stats' => true,
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/editer-defense-gvo/{id}", name="edit_defense", methods={"GET", "POST"})
     * @param Request $request
     * @param int $id
     * @return Response
     * @throws Exception
     */
    public function edit(Request $request, int $id) : Response
    {
        $this->checkLeader();

        $defense = $this->getDoctrine()->getRepository(Defense::class)->find($id);
        if($defense === null) {
            throw new NotFoundHttpException();
        }

        $form = $this->createForm(DefenseEnemyType::class, $defense);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($defense);

            $em->flush();

            return $this->redirectToRoute('enemy_guilds');
        }

        return $this->render('defenses/new.html.twig', [
            'isGVO' => true,
            'form' => $form->createView(),
            'edit' => true,
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/ajouter-defense-de-joueur/{id}", name="add_defense_guildmate", methods={"GET", "POST"})
     * @param Request $request
     * @param int $id
     * @return Response
     * @throws Exception
     */
    public function addDefensePlayer(Request $request, int $id) : Response
    {
        $this->checkLeader();

        $user = $this->getDoctrine()->getRepository(User::class)->find($id);
        if($user === null) {
            throw new NotFoundHttpException();
        }

        $defense = new Defense();

        $form = $this->createForm(DefenseGuildmateType::class, $defense);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $defense->setOwner($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($defense);

            $em->flush();

            return $this->redirectToRoute('guild_management');
        }

        return $this->render('defenses/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}