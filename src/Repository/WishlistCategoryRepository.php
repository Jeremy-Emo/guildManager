<?php

namespace App\Repository;

use App\Entity\WishlistCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method WishlistCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method WishlistCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method WishlistCategory[]    findAll()
 * @method WishlistCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WishlistCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WishlistCategory::class);
    }

    // /**
    //  * @return WishlistCategory[] Returns an array of WishlistCategory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WishlistCategory
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
