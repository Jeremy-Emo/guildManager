<?php

namespace App\Repository;

use App\Entity\AchievementsCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method AchievementsCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method AchievementsCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method AchievementsCategory[]    findAll()
 * @method AchievementsCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AchievementsCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AchievementsCategory::class);
    }

    // /**
    //  * @return AchievementsCategory[] Returns an array of AchievementsCategory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AchievementsCategory
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
