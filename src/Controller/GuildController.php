<?php

namespace App\Controller;

use App\Entity\GvGScores;
use App\Entity\Members;
use App\Entity\User;
use App\Form\Type\GuildInfosType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class GuildController extends AbstractController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/guilde/gestion", name="guild_management", methods={"GET", "POST"})
     * @return Response
     */
    public function index() : Response
    {
        if($this->getUser()->getMember() === null || !$this->getUser()->getMember()->getIsLeader()) {
            throw new NotFoundHttpException();
        }

        $guild = $this->getUser()->getMember()->getGuild();

        $members = $this->getDoctrine()->getRepository(User::class)->getMembers($guild);

        $scores = $this->getDoctrine()->getRepository(GvGScores::class)->findBy([
            'year' => date("Y"),
            'semaine' => date("W"),
        ]);

        return $this->render('guild/index.html.twig', [
            'guild' => $guild,
            'isGuildManagement' => true,
            'members' => $members,
            'needScores' => count($scores) > 0 ? false : true,
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
        if($this->getUser()->getMember() === null || !$this->getUser()->getMember()->getIsLeader()) {
            throw new NotFoundHttpException();
        }

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
        if($this->getUser()->getMember() === null || !$this->getUser()->getMember()->getIsLeader()) {
            throw new NotFoundHttpException();
        }

        $guild = $this->getUser()->getMember()->getGuild();

        $form = $this->createFormBuilder();
        foreach($guild->getMembers() as $member) {
            if($member->getIsInGvG()){
                $form->add('score'.$member->getId(), IntegerType::class, [
                    'required' => true,
                    'label' => $member->getUser()->getUsername(),
                    'attr' => [
                        'data-id' => $member->getId(),
                        'min' => 0,
                        'max' => 36,
                    ],
                ]);
            }
        }
        $formFinal = $form->getForm();

        $formFinal->handleRequest($request);

        if($formFinal->isSubmitted() && $formFinal->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            foreach($formFinal->getData() as $key => $data) {
                $scores = new GvGScores();
                $scores->setYear(date('Y'))->setSemaine(date('W'));
                $scores->setUser($this->getDoctrine()->getRepository(Members::class)->find((int) str_replace('score', '', $key)));
                $scores->setAttackNumber($data);
                $em->persist($scores);
                $em->flush();
            }

            return $this->redirectToRoute('guild_management');
        }

        return $this->render('guild/gvgScores.html.twig', [
            'form' => $formFinal->createView(),
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/guilde/membre/{id}", name="guild_member_info", methods={"GET", "POST"})
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function viewMember(Request $request, int $id) : Response
    {
        if($this->getUser()->getMember() === null) {
            throw new NotFoundHttpException();
        }

        $member = $this->getDoctrine()->getRepository(Members::class)->find($id);

        return $this->render('guild/viewMember.html.twig', [
            'member' => $member
        ]);
    }
}