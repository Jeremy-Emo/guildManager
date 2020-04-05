<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GenericController extends AbstractController
{
    protected function checkAdmin()
    {
        if(!$this->getUser()->getIsAdmin()){
            throw new NotFoundHttpException();
        }
    }

    protected function checkLeader()
    {
        if($this->getUser()->getMember() === null || !$this->getUser()->getMember()->getIsLeader()){
            throw new NotFoundHttpException();
        }
    }

    protected function getIfLeaderOrAdmin()
    {
        try {
            if($this->getUser()->getMember()->getIsLeader() || $this->getUser()->getIsAdmin()){
                return true;
            } else {
                return false;
            }
        } catch(\Exception $e) {
            return false;
        }
    }
}