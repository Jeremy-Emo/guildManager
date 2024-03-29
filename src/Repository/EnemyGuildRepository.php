<?php

namespace App\Repository;

use App\Entity\EnemyGuild;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EnemyGuild|null find($id, $lockMode = null, $lockVersion = null)
 * @method EnemyGuild|null findOneBy(array $criteria, array $orderBy = null)
 * @method EnemyGuild[]    findAll()
 * @method EnemyGuild[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnemyGuildRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EnemyGuild::class);
    }

    // /**
    //  * @return EnemyGuild[] Returns an array of EnemyGuild objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EnemyGuild
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
