<?php

namespace App\Repository;

use App\Entity\MonsterFamily;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MonsterFamily|null find($id, $lockMode = null, $lockVersion = null)
 * @method MonsterFamily|null findOneBy(array $criteria, array $orderBy = null)
 * @method MonsterFamily[]    findAll()
 * @method MonsterFamily[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MonsterFamilyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MonsterFamily::class);
    }

    // /**
    //  * @return MonsterFamily[] Returns an array of MonsterFamily objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MonsterFamily
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
