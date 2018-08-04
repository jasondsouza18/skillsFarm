<?php

namespace App\Repository;

use App\Entity\JobseekerResume;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method JobseekerResume|null find($id, $lockMode = null, $lockVersion = null)
 * @method JobseekerResume|null findOneBy(array $criteria, array $orderBy = null)
 * @method JobseekerResume[]    findAll()
 * @method JobseekerResume[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobseekerResumeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, JobseekerResume::class);
    }

//    /**
//     * @return JobseekerResume[] Returns an array of JobseekerResume objects
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
    public function findOneBySomeField($value): ?JobseekerResume
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
