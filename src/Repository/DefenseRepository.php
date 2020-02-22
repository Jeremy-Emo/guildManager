<?php

namespace App\Repository;

use App\Entity\Defense;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Defense|null find($id, $lockMode = null, $lockVersion = null)
 * @method Defense|null findOneBy(array $criteria, array $orderBy = null)
 * @method Defense[]    findAll()
 * @method Defense[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DefenseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Defense::class);
    }

    public function getDefensesWhereIsMob(string $name)
    {
        $qb = $this->createQueryBuilder('d')
            ->join('d.mobLeader', 'ml')
            ->join('d.mobOne', 'mo')
            ->join('d.mobTwo', 'mt')
            ->where('ml.name like :name or mo.name like :name or mt.name like :name')
            ->setParameter('name', '%'.$name.'%')
        ;

        return $qb->getQuery()->execute();
    }

    // /**
    //  * @return Defense[] Returns an array of Defense objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Defense
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
