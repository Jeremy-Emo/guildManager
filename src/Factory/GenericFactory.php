<?php

namespace App\Factory;

use Doctrine\Persistence\ManagerRegistry;

class GenericFactory
{
    protected $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }
}