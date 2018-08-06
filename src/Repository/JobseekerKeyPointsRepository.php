<?php

namespace App\Repository;

use App\Entity\JobseekerKeyPoints;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method JobseekerKeyPoints|null find($id, $lockMode = null, $lockVersion = null)
 * @method JobseekerKeyPoints|null findOneBy(array $criteria, array $orderBy = null)
 * @method JobseekerKeyPoints[]    findAll()
 * @method JobseekerKeyPoints[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobseekerKeyPointsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, JobseekerKeyPoints::class);
    }

//    /**
//     * @return JobseekerKeyPoints[] Returns an array of JobseekerKeyPoints objects
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
    public function findOneBySomeField($value): ?JobseekerKeyPoints
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
