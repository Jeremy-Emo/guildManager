<?php

namespace App\Repository;

use App\Entity\GvGScores;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method GvGScores|null find($id, $lockMode = null, $lockVersion = null)
 * @method GvGScores|null findOneBy(array $criteria, array $orderBy = null)
 * @method GvGScores[]    findAll()
 * @method GvGScores[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GvGScoresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GvGScores::class);
    }

    public function getScoresForWeekAndGuild($week, $year, $guild)
    {
        $dto = new DateTime();
        $dto->setISODate($year, $week);
        $start = $dto->format('Y-m-d');

        $qb = $this->createQueryBuilder('s')
            ->join('s.user', 'm')
            ->join('m.guild', 'g')
            ->andWhere('s.semaine = :week')
            ->andWhere('s.year = :year')
            ->setParameter('week', $week)
            ->setParameter('year', $year)
            ->andWhere('g.id = :guild')
            ->setParameter('guild', $guild->getId())
            ->andWhere('m.changeGuildDate < :start OR m.changeGuildDate is null')
            ->setParameter('start', $start)
        ;

        return $qb->getQuery()->getResult();

    }

    // /**
    //  * @return GvGScores[] Returns an array of GvGScores objects
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
    public function findOneBySomeField($value): ?GvGScores
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
