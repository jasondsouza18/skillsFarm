<?php

namespace App\Repository;

use App\Entity\Jobseeker;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Jobseeker|null find($id, $lockMode = null, $lockVersion = null)
 * @method Jobseeker|null findOneBy(array $criteria, array $orderBy = null)
 * @method Jobseeker[]    findAll()
 * @method Jobseeker[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobseekerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Jobseeker::class);
    }

//    /**
//     * @return Jobseeker[] Returns an array of Jobseeker objects
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
    public function findOneBySomeField($value): ?Jobseeker
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
