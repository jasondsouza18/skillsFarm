<?php

namespace App\Repository;

use App\Entity\JobseekerEducation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method JobseekerEducation|null find($id, $lockMode = null, $lockVersion = null)
 * @method JobseekerEducation|null findOneBy(array $criteria, array $orderBy = null)
 * @method JobseekerEducation[]    findAll()
 * @method JobseekerEducation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobseekerEducationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, JobseekerEducation::class);
    }

//    /**
//     * @return JobseekerEducation[] Returns an array of JobseekerEducation objects
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
    public function findOneBySomeField($value): ?JobseekerEducation
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
