<?php

namespace App\Command;

use App\Entity\User;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CreateUserCommand extends Command
{
    protected static $defaultName = 'app:create-user';

    private $container;
    private $passwordEncoder;

    public function __construct(ContainerInterface $container, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->container = $container;
        $this->passwordEncoder = $passwordEncoder;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Permet la création d\'un utilisateur')
            ->addArgument('name', InputArgument::REQUIRED, "Le nom de l'utilisateur")
            ->addArgument('password', InputArgument::REQUIRED, "Le mot de passe de l'utilisateur")
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->container->get('doctrine')->getManager();
        $name = $input->getArgument('name');

        $user = new User();
        $user->setUsername($name);
        $pwd = $this->passwordEncoder->encodePassword($user, $input->getArgument('password'));
        $user->setPassword($pwd);
        $em->persist($user);
        $em->flush();

        return 0;
    }
}