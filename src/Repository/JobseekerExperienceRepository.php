<?php

namespace App\Repository;

use App\Entity\JobseekerExperience;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method JobseekerExperience|null find($id, $lockMode = null, $lockVersion = null)
 * @method JobseekerExperience|null findOneBy(array $criteria, array $orderBy = null)
 * @method JobseekerExperience[]    findAll()
 * @method JobseekerExperience[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobseekerExperienceRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, JobseekerExperience::class);
    }

//    /**
//     * @return JobseekerExperience[] Returns an array of JobseekerExperience objects
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
    public function findOneBySomeField($value): ?JobseekerExperience
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
