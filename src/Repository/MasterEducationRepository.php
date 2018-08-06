<?php

namespace App\Repository;

use App\Entity\MasterEducation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MasterEducation|null find($id, $lockMode = null, $lockVersion = null)
 * @method MasterEducation|null findOneBy(array $criteria, array $orderBy = null)
 * @method MasterEducation[]    findAll()
 * @method MasterEducation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MasterEducationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MasterEducation::class);
    }

//    /**
//     * @return MasterEducation[] Returns an array of MasterEducation objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MasterEducation
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
