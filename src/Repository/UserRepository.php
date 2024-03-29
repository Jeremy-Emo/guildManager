<?php

namespace App\Repository;

use App\Entity\Guild;
use App\Entity\Monster;
use App\Entity\User;
use App\Entity\WishlistCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     * @param UserInterface $user
     * @param string $newEncodedPassword
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function upgradePassword(UserInterface $user, string $newEncodedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
        }

        $user->setPassword($newEncodedPassword);
        $this->_em->persist($user);
        $this->_em->flush();
    }

    public function getMembers(Guild $guild)
    {
        $qb = $this->createQueryBuilder('u');
        $qb
            ->join('u.member', 'm')
            ->join('m.guild', 'g')
            ->orderBy('u.username', 'ASC')
            ->where('g.id = :id')
            ->setParameter('id', $guild->getId())
        ;
        return $qb->getQuery()->execute();
    }

    public function getMembersInValidation(Guild $guild)
    {
        $qb = $this->createQueryBuilder('u');
        $qb
            ->join('u.member', 'm')
            ->join('m.guild', 'g')
            ->join('u.achivementsInValidation', 'uv')
            ->orderBy('u.username', 'ASC')
            ->where('g.id = :id')
            ->andWhere('uv.id is not null')
            ->setParameter('id', $guild->getId())
        ;
        return $qb->getQuery()->execute();
    }

    public function getMonstersNotInWishlist(User $user)
    {
        $qb = $this->_em->createQueryBuilder();

        $sub = $this->createQueryBuilder('u')
            ->select('ms')
            ->join('u.wishlistCategories', 'wl')
            ->join('wl.monsters', 'ms')
            ->where('u.id = :id')
        ;

        $qb
            ->from(Monster::class, 'm')
            ->select('m')
            ->join('m.monsterFamily', 'f')
            ->orderBy('f.name', 'ASC')
            ->where($qb->expr()->notIn('m', $sub->getDQL()))
            ->setParameter('id', $user->getId())
        ;

        return $qb->getQuery()->execute();
    }

    public function getWishlist(User $user)
    {
        $qb = $this->_em->createQueryBuilder();
        $qb
            ->from(WishlistCategory::class, 'wl')
            ->join('wl.user', 'u')
            ->select('wl')
            ->orderBy('wl.priority', 'DESC')
            ->where('u.id = :id')
            ->setParameter('id', $user->getId())
            ->setMaxResults(1)
        ;

        return $qb->getQuery()->execute();
    }

    // /**
    //  * @return User[] Returns an array of User objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
