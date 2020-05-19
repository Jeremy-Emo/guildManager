<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GenericController extends AbstractController
{

    protected function checkLeader()
    {
        if($this->getUser()->getMember() === null || !$this->getUser()->getMember()->getIsLeader()){
            throw new NotFoundHttpException();
        }
    }

    protected function checkMemberOfGuild()
    {
        if($this->getUser()->getMember() === null){
            throw new NotFoundHttpException();
        }
    }

    protected function getIfLeaderOrAdmin()
    {
        try {
            if($this->getUser()->getMember()->getIsLeader() || in_array("ROLE_ADMIN", $this->getUser()->getRoles())){
                return true;
            } else {
                return false;
            }
        } catch(\Exception $e) {
            return false;
        }
    }

    protected function getUser()
    {
        $user = parent::getUser();

        return ($user instanceof User) ? $user : null;
    }
}