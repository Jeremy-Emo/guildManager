<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\Type\NewEventType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/event/{id}", name="show_event", methods={"GET"})
     * @param int $id
     * @return Response
     */
    public function index(int $id) : Response
    {
        $event = $this->getDoctrine()->getRepository(Event::class)->find($id);

        return $this->render('event/index.html.twig', [
            'event' => $event
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/nouvel-event", name="new_event", methods={"GET", "POST"})
     * @param Request $request
     * @return Response
    */
    public function new(Request $request) : Response
    {
        $event = new Event();
        $form = $this->createForm(NewEventType::class, $event);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $event->setOwner($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render('event/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/supprimer-event/{id}", name="delete_event", methods={"GET"})
     * @param int $id
     * @return Response
     */
    public function delete(int $id) : Response
    {
        $event = $this->getDoctrine()->getRepository(Event::class)->find($id);
        $em = $this->getDoctrine()->getManager();

        $em->remove($event);
        $em->flush();

        return $this->redirectToRoute('index');
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/inscription-event/{id}", name="register_event", methods={"GET"})
     * @param int $id
     * @return Response
     */
    public function register(int $id) : Response
    {
        $event = $this->getDoctrine()->getRepository(Event::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $event->addInscrit($this->getUser());
        $em->persist($event);
        $em->flush();

        return $this->redirectToRoute('show_event', [
            'id' => $id,
        ]);
    }
}