<?php

namespace App\Repository;

use App\Entity\SiegeTowers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SiegeTowers|null find($id, $lockMode = null, $lockVersion = null)
 * @method SiegeTowers|null findOneBy(array $criteria, array $orderBy = null)
 * @method SiegeTowers[]    findAll()
 * @method SiegeTowers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SiegeTowersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SiegeTowers::class);
    }

    // /**
    //  * @return SiegeTowers[] Returns an array of SiegeTowers objects
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
    public function findOneBySomeField($value): ?SiegeTowers
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
