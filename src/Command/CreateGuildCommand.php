<?php

namespace App\Command;

use App\Entity\Guild;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class CreateGuildCommand extends Command
{
    protected static $defaultName = 'app:create-guild';

    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Permet la création d\'une guilde')
            ->addArgument('name', InputArgument::REQUIRED, "Le nom de la guilde")
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->container->get('doctrine')->getManager();
        $name = $input->getArgument('name');

        $guild = new Guild();
        $guild->setName($name);
        $em->persist($guild);
        $em->flush();

        return 0;
    }
}