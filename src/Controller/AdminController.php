<?php

namespace App\Controller;

use App\Entity\Achievement;
use App\Entity\Buildings;
use App\Entity\Guild;
use App\Entity\Members;
use App\Entity\Monster;
use App\Entity\Scores;
use App\Entity\User;
use App\Form\Type\BuildingsType;
use App\Form\Type\EditPasswordType;
use App\Form\Type\HfType;
use App\Form\Type\LeadersType;
use App\Form\Type\MonsterType;
use App\Form\Type\NewGuildType;
use App\Form\Type\NewUserType;
use App\Form\Type\RecordsType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminController extends GenericController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/admin/comptes", name="admin_accounts", methods={"GET", "POST"})
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return Response
     */
    public function index(Request $request, UserPasswordEncoderInterface $passwordEncoder) : Response
    {
        $this->checkAdmin();

        $user = new User();
        $form = $this->createForm(NewUserType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('admin_accounts');
        }

        $users = $this->getDoctrine()->getRepository(User::class)->findBy([], [
            'username' => 'ASC'
        ]);

        return $this->render('admin/index.html.twig', [
            'form' => $form->createView(),
            'users' => $users,
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/admin/compte/{id}", name="admin_edit_account", methods={"GET", "POST"})
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param int $id
     * @return Response
     */
    public function editAccount(Request $request, UserPasswordEncoderInterface $passwordEncoder, int $id) : Response
    {
        $this->checkAdmin();

        $user = $this->getDoctrine()->getRepository(User::class)->find($id);

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

            return $this->redirectToRoute('admin_accounts');
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

            return $this->redirectToRoute('admin_accounts');
        }

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

            return $this->redirectToRoute('admin_accounts');
        }

        return $this->render('admin/editAccount.html.twig', [
            'formRecords' => $formRecords->createView(),
            'formBuilds' => $formBuilds->createView(),
            'form' => $form->createView(),
            'user' => $user,
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/admin/supprimer-compte/{id}", name="admin_delete_account", methods={"GET"})
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function deleteAccount(Request $request, int $id) : Response
    {
        $this->checkAdmin();

        $user = $this->getDoctrine()->getRepository(User::class)->find($id);
        if(!$user->getIsAdmin()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        } else {
            throw new NotFoundHttpException();
        }

        return $this->redirectToRoute('admin_accounts');
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/admin/guildes", name="admin_guilds", methods={"GET", "POST"})
     * @param Request $request
     * @return Response
     */
    public function indexGuilds(Request $request) : Response
    {
        $this->checkAdmin();

        $guild = new Guild();
        $form = $this->createForm(NewGuildType::class, $guild);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($guild);
            $em->flush();

            return $this->redirectToRoute('admin_guilds');
        }

        $guilds = $this->getDoctrine()->getRepository(Guild::class)->findBy([], [
            'name' => 'ASC'
        ]);

        return $this->render('admin/guilds.html.twig', [
            'form' => $form->createView(),
            'guilds' => $guilds,
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/admin/guilde/leaders/{id}", name="admin_guild_leaders", methods={"GET", "POST"})
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function guildLeaders(Request $request, int $id) : Response
    {
        $this->checkAdmin();

        $guild = $this->getDoctrine()->getRepository(Guild::class)->find($id);

        if($guild === null) {
            throw new NotFoundHttpException();
        }

        $guildLeadersId = [];
        foreach($guild->getMembers() as $member){
            if($member->getIsLeader()){
                $guildLeadersId[] = $member->getId();
            }
        }

        $options['id'] = $guild->getId();

        $form = $this->createForm(LeadersType::class, null, $options);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            foreach($guild->getMembers() as $member){
                $member->setIsLeader(false);
                $em->persist($member);
            }
            foreach ($form->get('members')->getData() as $data){
                $member = $this->getDoctrine()->getRepository(Members::class)->find($data);
                $member->setIsLeader(true);
                $em->persist($member);
            }
            $em->flush();
            return $this->redirectToRoute('admin_guilds');
        }

        return $this->render('admin/guildLeaders.html.twig', [
            'form' => $form->createView(),
            'guild' => $guild,
            'leaders' => $guildLeadersId,
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/admin/defis", name="admin_hf", methods={"GET", "POST"})
     * @param Request $request
     * @return Response
     */
    public function hf(Request $request) : Response
    {
        $this->checkAdmin();

        $hf = new Achievement();
        $form = $this->createForm(HfType::class, $hf);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($hf);
            $em->flush();

            return $this->redirectToRoute('admin_hf');
        }

        $hfs = $this->getDoctrine()->getRepository(Achievement::class)->findBy([], [
            'name' => 'ASC'
        ]);

        return $this->render('admin/hfs.html.twig', [
            'form' => $form->createView(),
            'hfs' => $hfs,
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/admin/supprimer-defi/{id}", name="admin_hf_delete", methods={"GET"})
     * @param int $id
     * @return Response
     */
    public function hfDelete(int $id) : Response
    {
        $this->checkAdmin();

        $hf = $this->getDoctrine()->getRepository(Achievement::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($hf);
        $em->flush();

        return $this->redirectToRoute('admin_hf');
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/admin/monstres", name="admin_monsters", methods={"GET"})
     * @return Response
     */
    public function monsters() : Response
    {
        $this->checkAdmin();

        $monsters = $this->getDoctrine()->getRepository(Monster::class)->findBy([], [
            'name' => 'ASC'
        ]);

        return $this->render('admin/monsters.html.twig', [
            'monsters' => $monsters,
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/admin/editer-monstre/{id}", name="admin_monster_edit", methods={"GET", "POST"})
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function editMonster(Request $request, int $id) : Response
    {
        $this->checkAdmin();

        $monster = $this->getDoctrine()->getRepository(Monster::class)->find($id);

        if($monster === null){
            throw new NotFoundHttpException();
        }

        $form = $this->createForm(MonsterType::class, $monster);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($monster);
            $em->flush();

            return $this->redirectToRoute('admin_monsters');
        }

        return $this->render('admin/editMonster.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}