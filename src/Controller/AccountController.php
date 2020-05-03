<?php

namespace App\Controller;

use App\Entity\Achievement;
use App\Entity\AchievementsCategory;
use App\Entity\Buildings;
use App\Entity\Scores;
use App\Entity\User;
use App\Form\Type\BuildingsType;
use App\Form\Type\EditAccountInfosType;
use App\Form\Type\EditPasswordType;
use App\Form\Type\RecordsType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AccountController extends GenericController
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

            return $this->redirectToRoute('edit_account', ['_fragment' => 'profilPassword']);
        }

        $formAccount = $this->createForm(EditAccountInfosType::class, $user);
        $formAccount->handleRequest($request);

        if ($formAccount->isSubmitted() && $formAccount->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('edit_account', ['_fragment' => 'profilInfos']);
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

            return $this->redirectToRoute('edit_account', ['_fragment' => 'profilRecords']);
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

            return $this->redirectToRoute('edit_account', ['_fragment' => 'profilBatiments']);
        }

        return $this->render('account/edit.html.twig', [
            'form' => $form->createView(),
            'formAccount' => $formAccount->createView(),
            'formRecords' => $formRecords->createView(),
            'formBuilds' => $formBuilds->createView(),
            'isMyAccount' => true,
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/editer-defis/{id}", name="edit_hfs", methods={"GET"})
     * @param int $id
     * @return Response
     */
    public function updateHFS(int $id) : Response
    {
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);

        if($user === null || !$this->getUser()->getIsAdmin()){
            throw new NotFoundHttpException();
        }

        $hfs = $this->getDoctrine()->getRepository(Achievement::class)->getWhereNoCategory();
        $hfsCat = $this->getDoctrine()->getRepository(AchievementsCategory::class)->findAll();

        return $this->render('account/updateHFS.html.twig', [
            'user' => $user,
            'hfs' => $hfs,
            'hfsCat' => $hfsCat,
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/toggle-defi", name="toggle_defi", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function toggleHF(Request $request) : Response
    {
        if($request->isXmlHttpRequest()){

            $id = $request->request->get('id');
            $hf = $request->request->get('hf');

            if($id === null || $hf === null || !$this->getUser()->getIsAdmin()) {
                throw new NotFoundHttpException();
            }
            $user = $this->getDoctrine()->getRepository(User::class)->find($id);
            $hf = $this->getDoctrine()->getRepository(Achievement::class)->find($hf);

            if($user->getAchievements()->contains($hf)){
                $user->removeAchievement($hf);
            } else {
                $user->addAchievement($hf);
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return new JsonResponse([
                "success" => true,
            ]);
        } else {
            throw new NotFoundHttpException();
        }
    }
}