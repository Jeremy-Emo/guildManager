<?php

namespace App\Repository;

use App\Entity\Siege;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Siege|null find($id, $lockMode = null, $lockVersion = null)
 * @method Siege|null findOneBy(array $criteria, array $orderBy = null)
 * @method Siege[]    findAll()
 * @method Siege[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SiegeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Siege::class);
    }

    // /**
    //  * @return Siege[] Returns an array of Siege objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Siege
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
