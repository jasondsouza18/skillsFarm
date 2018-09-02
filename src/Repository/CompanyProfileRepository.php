<?php

namespace App\Repository;

use App\Entity\CompanyProfile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CompanyProfile|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompanyProfile|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompanyProfile[]    findAll()
 * @method CompanyProfile[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompanyProfileRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CompanyProfile::class);
    }

//    /**
//     * @return CompanyProfile[] Returns an array of CompanyProfile objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CompanyProfile
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
