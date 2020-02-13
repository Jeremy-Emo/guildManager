<?php

namespace App\Controller;

use App\Entity\Buildings;
use App\Entity\Scores;
use App\Form\Type\BuildingsType;
use App\Form\Type\EditAccountInfosType;
use App\Form\Type\EditPasswordType;
use App\Form\Type\RecordsType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AccountController extends AbstractController
{

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/edition-compte", name="edit_account", methods={"GET", "POST"})
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return Response
     */
    public function edit(Request $request, UserPasswordEncoderInterface $passwordEncoder) : Response
    {
        $user = $this->getUser();

        $form = $this->createForm(EditPasswordType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('edit_account');
        }

        $formAccount = $this->createForm(EditAccountInfosType::class, $user);
        $formAccount->handleRequest($request);

        if ($formAccount->isSubmitted() && $formAccount->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('edit_account');
        }

        if($user->getScores() === null) {
            $records = new Scores();
            $records->setUser($user);
        } else {
            $records = $user->getScores();
        }
        $formRecords = $this->createForm(RecordsType::class, $records);
        $formRecords->handleRequest($request);

        if ($formRecords->isSubmitted() && $formRecords->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($records);
            $entityManager->flush();

            return $this->redirectToRoute('edit_account');
        }

        if($user->getBuildings() === null) {
            $builds = new Buildings();
            $builds->setUser($user);
        } else {
            $builds = $user->getBuildings();
        }
        $formBuilds = $this->createForm(BuildingsType::class, $builds);
        $formBuilds->handleRequest($request);

        if($formBuilds->isSubmitted() && $formBuilds->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($builds);
            $entityManager->flush();

            return $this->redirectToRoute('edit_account');
        }

        return $this->render('account/edit.html.twig', [
            'form' => $form->createView(),
            'formAccount' => $formAccount->createView(),
            'formRecords' => $formRecords->createView(),
            'formBuilds' => $formBuilds->createView(),
            'isMyAccount' => true,
        ]);
    }
}