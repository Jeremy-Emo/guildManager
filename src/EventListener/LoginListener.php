<?php

namespace App\EventListener;

use Doctrine\ORM\EntityManager;

use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class LoginListener
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {
        $user = $event->getAuthenticationToken()->getUser();
        $user->setLastVisitAt(new \DateTime('now'));

        $this->entityManager->flush();
    }
}