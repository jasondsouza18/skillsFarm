<?php

namespace App\Repository;

use App\Entity\JobseekerWishlist;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method JobseekerWishlist|null find($id, $lockMode = null, $lockVersion = null)
 * @method JobseekerWishlist|null findOneBy(array $criteria, array $orderBy = null)
 * @method JobseekerWishlist[]    findAll()
 * @method JobseekerWishlist[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobseekerWishlistRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, JobseekerWishlist::class);
    }

//    /**
//     * @return JobseekerWishlist[] Returns an array of JobseekerWishlist objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?JobseekerWishlist
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
