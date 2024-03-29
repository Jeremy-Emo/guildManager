<?php

namespace App\Controller;

use App\Entity\Defense;
use App\Entity\Offense;
use App\Form\Type\DefenseType;
use App\Form\Type\OffenseType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Routing\Annotation\Route;

class OffensesController extends GenericController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/offenses-gvo", name="gvo_offs", methods={"GET"})
     * @return Response
     */
    public function index() : Response
    {
        $defs = $this->getDoctrine()->getRepository(Defense::class)->getDefenseExamplesOrdered();

        return $this->render('offenses/index.html.twig', [
            'isOffensesGVO' => true,
            'defs' => $defs,
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/ajouter-defense-courante-gvo", name="gvo_def_example_add", methods={"GET", "POST"})
     * @param Request $request
     * @return Response
     */
    public function addDef(Request $request) : Response
    {
        $defense = new Defense();

        $form = $this->createForm(DefenseType::class, $defense);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $defense
                ->setVictories(0)
                ->setLoses(0)
                ->setIsExample(true)
            ;

            $em = $this->getDoctrine()->getManager();
            $em->persist($defense);
            $em->flush();

            return $this->redirectToRoute('gvo_offs');
        }

        return $this->render('defenses/new.html.twig', [
            'isOffensesGVO' => true,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/nouvelle-offense-gvo/{id}", name="gvo_off_new", methods={"GET", "POST"})
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function new(Request $request, int $id) : Response
    {
        $off = new Offense();
        $def = $this->getDoctrine()->getRepository(Defense::class)->find($id);

        if($def === null) {
            throw new NotFoundHttpException();
        }

        $form = $this->createForm(OffenseType::class, $off);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $off
                ->setOwner($this->getUser())
                ->setDefense($def)
            ;

            $em = $this->getDoctrine()->getManager();
            $em->persist($off);
            $em->flush();

            return $this->redirectToRoute('gvo_off_new', ['id' => $id]);
        }

        return $this->render('offenses/new.html.twig', [
            'isOffensesGVO' => true,
            'form' => $form->createView(),
            'defense' => $def,
        ]);
    }


    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/supprimer-offense-gvo/{id}", name="gvo_off_delete", methods={"GET"})
     * @param int $id
     * @return Response
     */
    public function delete(int $id) : Response
    {
        $offense = $this->getDoctrine()->getRepository(Offense::class)->findOneBy([
            'id' => $id,
        ]);

        if($offense === null){
            throw new NotFoundHttpException();
        }

        $em = $this->getDoctrine()->getManager();

        $em->remove($offense);

        $em->flush();

        return $this->redirectToRoute('gvo_offs');
    }
}