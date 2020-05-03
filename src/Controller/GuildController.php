<?php

namespace App\Controller;

use App\Entity\Achievement;
use App\Entity\Guild;
use App\Entity\GvGScores;
use App\Entity\Members;
use App\Entity\User;
use App\Form\Type\GuildInfosType;
use App\Form\Type\LeaderNoteType;
use App\Form\Type\PlayerNoteType;
use App\Form\Type\SelectTimeType;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class GuildController extends GenericController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/guilde/gestion", name="guild_management", methods={"GET", "POST"})
     * @return Response
     */
    public function index() : Response
    {
        if($this->getUser()->getMember() === null) {
            throw new NotFoundHttpException();
        }

        $guild = $this->getUser()->getMember()->getGuild();

        $members = $this->getDoctrine()->getRepository(User::class)->getMembers($guild);

        return $this->render('guild/index.html.twig', [
            'guild' => $guild,
            'isGuildManagement' => true,
            'members' => $members,
            'leader' => $this->getUser()->getMember()->getIsLeader(),
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/guilde/infos", name="guild_manage_infos", methods={"GET", "POST"})
     * @param Request $request
     * @return Response
     */
    public function infos(Request $request) : Response
    {
        $this->checkLeader();

        $guild = $this->getUser()->getMember()->getGuild();

        $form = $this->createForm(GuildInfosType::class, $guild);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($guild);
            $em->flush();

            return $this->redirectToRoute('guild_manage_infos');
        }

        return $this->render('guild/infos.html.twig', [
            'guild' => $guild,
            'isGuildManagement' => true,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/guilde/scores/gvg", name="guild_register_gvg_scores", methods={"GET", "POST"})
     * @param Request $request
     * @return Response
     */
    public function gvgScores(Request $request) : Response
    {
        $this->checkLeader();

        //Getting infos guild
        $guild = $this->getUser()->getMember()->getGuild();
        $members = $this->getDoctrine()->getRepository(Guild::class)->getMembersInGvG($guild);


        //Checking if need scores
        $scores = $this->getDoctrine()->getRepository(GvGScores::class)->findBy([
            'year' => date("Y"),
            'semaine' => date("W"),
        ]);

        $needScores = true;
        foreach($scores as $score){
            if(in_array($score->getUser(), $members)){
                $needScores = false;
            }
        }

        //form stats
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

        //form stats
        if($needScores){
            $formScore = $this->createFormBuilder();
            foreach($members as $member) {
                $formScore->add('score'.$member->getId(), IntegerType::class, [
                    'required' => false,
                    'label' => $member->getUser()->getUsername(),
                    'attr' => [
                        'data-id' => $member->getId(),
                        'min' => 0,
                        'max' => 36,
                    ],
                ]);
            }
            $formFinal = $formScore->getForm();

            $formFinal->handleRequest($request);

            if($formFinal->isSubmitted() && $formFinal->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                foreach($formFinal->getData() as $key => $data) {
                    if($data !== "" && $data !== null){
                        $scores = new GvGScores();
                        $scores->setYear(date('Y'))->setSemaine(date('W'));
                        $scores->setUser($this->getDoctrine()->getRepository(Members::class)->find((int) str_replace('score', '', $key)));
                        $scores->setAttackNumber($data);
                        $em->persist($scores);
                        $em->flush();
                    }
                }

                return $this->redirectToRoute('guild_register_gvg_scores');
            }
        }

        return $this->render('guild/gvgScores.html.twig', [
            'formScore' => isset($formFinal) ? $formFinal->createView() : null,
            'form' => $form->createView(),
            'users' => $users ?? null,
            'critical' => $critical,
            'warning' => $warning,
            'needScores' => $needScores,
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/guilde/membre/{id}", name="guild_member_info", methods={"GET", "POST"})
     * @param Request $request
     * @param int $id
     * @return Response
     * @throws \Exception
     */
    public function viewMember(Request $request, int $id) : Response
    {
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);
        $member = $this->getDoctrine()->getRepository(Members::class)->findOneBy([
            'user' => $user
        ]);

        if($this->getUser()->getMember() === null || $member === null) {
            throw new NotFoundHttpException();
        }

        $formPlayerNote = $this->createForm(PlayerNoteType::class, $member);
        $formPlayerNote->handleRequest($request);
        if($formPlayerNote->isSubmitted() && $formPlayerNote->isValid() && $this->getUser()->getMember()->getIsLeader()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($member);
            $em->flush();
            $this->redirectToRoute('guild_member_info', ['id' => $id]);
        }

        $formLeaderNote = $this->createForm(LeaderNoteType::class, $member);
        $formLeaderNote->handleRequest($request);
        if($formLeaderNote->isSubmitted() && $formLeaderNote->isValid() && $this->getUser()->getMember()->getIsLeader()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($member);
            $em->flush();
            $this->redirectToRoute('guild_member_info', ['id' => $id]);
        }

        $records = $this->getDoctrine()->getRepository(GvGScores::class)->findBy([
            'user' => $member,
            'year' => date("Y"),
        ], [
            'semaine' => 'DESC'
        ], 5);

        $recCollection = new ArrayCollection($records);
        $activity = $recCollection->getIterator();
        $activity->uasort(function ($first, $second) {
            return $first->getSemaine() > $second->getSemaine() ? 1 : -1;
        });

        $hfs = $this->getDoctrine()->getRepository(Achievement::class)->findAll();

        return $this->render('guild/viewMember.html.twig', [
            'member' => $member,
            'leader' => ($this->getUser()->getMember()->getIsLeader() || $this->getUser()->getIsAdmin()),
            'activity' => $activity,
            'hfs' => $hfs,
            'formLeaderNote' => $formLeaderNote->createView(),
            'formPlayerNote' => $formPlayerNote->createView(),
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/guilde/contenu/changer_options", name="guild_member_change_options", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function changeOptions(Request $request) : Response
    {
        if($request->isXmlHttpRequest()){

            $id = $request->request->get('id');
            $type = $request->request->get('type');

            if($id === null || $type === null || !$this->getUser()->getIsAdmin()) {
                throw new NotFoundHttpException();
            }
            $user = $this->getDoctrine()->getRepository(Members::class)->find($id);

            switch($type){
                case 'gvg':
                    $user->setIsInGvG(!$user->getIsInGvG());
                    $text = $user->getIsInGvG() ? 'Oui' : 'Non';
                    break;
                case 'gvo':
                    $user->setIsInGvO(!$user->getIsInGvO());
                    $text = $user->getIsInGvO() ? 'Oui' : 'Non';
                    break;
                default:
                    throw new NotFoundHttpException();
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return new JsonResponse([
                "success" => true,
                "txt" => $text,
            ]);
        } else {
            throw new NotFoundHttpException();
        }
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/guilde/classement/defis", name="guild_achievements_top", methods={"GET"})
     * @return Response
     */
    public function topHF(): Response
    {
        if($this->getUser()->getMember() === null){
            throw new NotFoundHttpException();
        }

        $guild = $this->getUser()->getMember()->getGuild();

        $members = $this->getDoctrine()->getRepository(Guild::class)->getMembersOrderByHF($guild);

        return $this->render('guild/hfTop.html.twig', [
            'members' => $members,
        ]);
    }
}