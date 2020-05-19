<?php

namespace App\Controller;

use App\Entity\Achievement;
use App\Entity\AchievementsCategory;
use App\Entity\Buildings;
use App\Entity\Monster;
use App\Entity\Scores;
use App\Entity\User;
use App\Entity\WishlistCategory;
use App\Form\Type\BuildingsType;
use App\Form\Type\EditAccountInfosType;
use App\Form\Type\EditPasswordType;
use App\Form\Type\RecordsType;
use Doctrine\Common\Collections\ArrayCollection;
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
     * @IsGranted("ROLE_ADMIN")
     * @Route("/editer-defis/{id}", name="edit_hfs", methods={"GET"})
     * @param int $id
     * @return Response
     */
    public function updateHFS(int $id) : Response
    {
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);

        if($user === null){
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
     * @IsGranted("ROLE_ADMIN")
     * @Route("/toggle-defi", name="toggle_defi", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function toggleHF(Request $request) : Response
    {
        if($request->isXmlHttpRequest()){

            $id = $request->request->get('id');
            $hf = $request->request->get('hf');

            if($id === null || $hf === null) {
                throw new NotFoundHttpException();
            }
            $user = $this->getDoctrine()->getRepository(User::class)->find($id);
            $hf = $this->getDoctrine()->getRepository(Achievement::class)->find($hf);

            if($user->getAchievements()->contains($hf)){
                $user->removeAchievement($hf);
            } else {
                $user->addAchievement($hf);
                if($user->getAchivementsInValidation()->contains($hf)){
                    $user->removeAchivementsInValidation($hf);
                }
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

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/demander-validation-defis", name="ask_validation_defi", methods={"GET", "POST"})
     * @param Request $request
     * @return Response
     */
    public function askValidation(Request $request) : Response
    {
        $hfs = $this->getDoctrine()->getRepository(Achievement::class)->getWhereNoCategory();
        $hfsCat = $this->getDoctrine()->getRepository(AchievementsCategory::class)->findAll();

        return $this->render('account/askHFS.html.twig', [
            'hfs' => $hfs,
            'hfsCat' => $hfsCat,
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/demander-defi", name="ask_defi", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function askHF(Request $request) : Response
    {
        if($request->isXmlHttpRequest()){

            $hf = $request->request->get('hf');

            if($hf === null) {
                throw new NotFoundHttpException();
            }
            $hf = $this->getDoctrine()->getRepository(Achievement::class)->find($hf);

            if($this->getUser()->getAchivementsInValidation()->contains($hf)){
                $this->getUser()->removeAchivementsInValidation($hf);
            } else {
                $this->getUser()->addAchivementsInValidation($hf);
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($this->getUser());
            $em->flush();

            return new JsonResponse([
                "success" => true,
            ]);
        } else {
            throw new NotFoundHttpException();
        }
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/editer-defis-en-attente/{id}", name="edit_hfs_in_validation", methods={"GET"})
     * @param int $id
     * @return Response
     */
    public function updateHFSinValidation(int $id) : Response
    {
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);

        if($user === null){
            throw new NotFoundHttpException();
        }

        $hfs = $this->getDoctrine()->getRepository(Achievement::class)->getWhereNoCategory();
        $hfsCat = $this->getDoctrine()->getRepository(AchievementsCategory::class)->findAll();

        return $this->render('account/updateHFSinValidation.html.twig', [
            'user' => $user,
            'hfs' => $hfs,
            'hfsCat' => $hfsCat,
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/ma-wishlist", name="wishlist", methods={"GET"})
     * @return Response
     * @throws \Exception
     */
    public function wishlist() : Response
    {
        //Get categories and create them if they don't exist
        $userCategories = $this->getUser()->getWishlistCategories();
        if($userCategories->count() === 0){
            $em = $this->getDoctrine()->getManager();
            //Génération catégories wishlist
            $cat1 = new WishlistCategory();
            $cat1->setPriority(25)->setName("Les monstres de mes rêves *_*")->setUser($this->getUser());
            $em->persist($cat1);
            $cat2 = new WishlistCategory();
            $cat2->setPriority(20)->setName("Je le veux dans mon équipe !")->setUser($this->getUser());
            $em->persist($cat2);
            $cat3 = new WishlistCategory();
            $cat3->setPriority(15)->setName("Mouais, si je l'ai je lui trouverai des runes quand même")->setUser($this->getUser());
            $em->persist($cat3);
            $cat4 = new WishlistCategory();
            $cat4->setPriority(10)->setName("Bof, juste parce que je l'ai pas")->setUser($this->getUser());
            $em->persist($cat4);

            $em->flush();
            return $this->redirectToRoute('wishlist');
        }

        //Re-order categories
        $iterator = $userCategories->getIterator();
        $iterator->uasort(function ($a, $b) {
            return ($a->getPriority() > $b->getPriority()) ? -1 : 1;
        });
        $userCategories = new ArrayCollection(iterator_to_array($iterator));

        //Getting monsters without categories
        $monsters = $this->getDoctrine()->getRepository(User::class)->getMonstersNotInWishlist($this->getUser());

        return $this->render('account/wishlist.html.twig', [
            'categories' => $userCategories,
            'monsters' => $monsters,
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/change-wishlist", name="change_wishlist", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function changeWishlist(Request $request) : Response
    {
        if($request->isXmlHttpRequest()){

            $catId = $request->request->get('catId');
            $mobId = $request->request->get('mobId');

            if($catId === null || $mobId === null) {
                throw new NotFoundHttpException();
            }

            $mob = $this->getDoctrine()->getRepository(Monster::class)->find($mobId);
            if($mob === null){
                throw new NotFoundHttpException();
            }

            $userCategories = $this->getDoctrine()->getRepository(WishlistCategory::class)->findBy([
                'user' => $this->getUser()
            ]);

            $previousCatOfMonster = null;
            foreach($userCategories as $category){
                if($category->getMonsters()->contains($mob)){
                    $previousCatOfMonster = $category;
                }
            }

            $em = $this->getDoctrine()->getManager();

            if($previousCatOfMonster !== null){
                $previousCatOfMonster->removeMonster($mob);
                $em->persist($previousCatOfMonster);
                $em->flush();
            }

            if($catId !== 0){
                $cat = $this->getDoctrine()->getRepository(WishlistCategory::class)->find($catId);
                if(! in_array($cat, $userCategories)){
                    throw new NotFoundHttpException();
                }
                $cat->addMonster($mob);
                $em->persist($cat);
                $em->flush();
            }

            return new JsonResponse([
                "success" => true,
            ]);
        } else {
            throw new NotFoundHttpException();
        }
    }

}