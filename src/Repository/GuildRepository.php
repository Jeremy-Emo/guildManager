<?php

namespace App\Repository;

use App\Entity\Guild;
use App\Entity\Members;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Guild|null find($id, $lockMode = null, $lockVersion = null)
 * @method Guild|null findOneBy(array $criteria, array $orderBy = null)
 * @method Guild[]    findAll()
 * @method Guild[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GuildRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Guild::class);
    }

    public function getMembersInGvG(Guild $guild)
    {
        $qb = $this->_em->createQueryBuilder();
        $qb
            ->from(Members::class, 'm')
            ->select('m')
            ->join('m.guild', 'g')
            ->join('m.user', 'u')
            ->orderBy('u.username', 'ASC')
            ->where('g.id = :id')
            ->andWhere('m.isInGvG = true')
            ->setParameter('id', $guild->getId())
        ;
        return $qb->getQuery()->execute();
    }

    public function getMembersOrderByHF(Guild $guild)
    {
        $qb = $this->_em->createQueryBuilder();
        $qb
            ->from(Members::class, 'm')
            ->select('m, count(a) as countage')
            ->join('m.guild', 'g')
            ->join('m.user', 'u')
            ->leftJoin('u.achievements', 'a')
            ->orderBy('countage', 'DESC')
            ->where('g.id = :id')
            ->setParameter('id', $guild->getId())
            ->groupBy('m')
        ;
        return $qb->getQuery()->execute();
    }

    // /**
    //  * @return Guild[] Returns an array of Guild objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Guild
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
