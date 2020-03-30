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
}