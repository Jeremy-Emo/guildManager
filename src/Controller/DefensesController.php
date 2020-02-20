<?php

namespace App\Controller;

use App\Entity\Defense;
use App\Form\Type\DefenseType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class DefensesController extends AbstractController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/defenses-gvo", name="gvo_defs", methods={"GET"})
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) : Response
    {
        $defRepo = $this->getDoctrine()->getRepository(Defense::class);

        $myDefenses = $defRepo->findBy([
            'owner' => $this->getUser(),
        ]);

        $form = $this->createFormBuilder()
            ->setMethod('GET')
            ->add('search', TextType::class)
            ->getForm()
        ;
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $results = $defRepo->getDefensesWhereIsMob($form->get('search')->getData());
        }

        return $this->render('defenses/index.html.twig', [
            'isGVO' => true,
            'myDefenses' => $myDefenses,
            'form' => $form->createView(),
            'results' => $results ?? null,
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

        $defense->setOwner(null)->setDetail("Ancienne défense de la guilde");

        $em = $this->getDoctrine()->getManager();
        $em->persist($defense);
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
}