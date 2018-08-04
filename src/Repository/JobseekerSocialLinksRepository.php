<?php

namespace App\Repository;

use App\Entity\JobseekerSocialLinks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method JobseekerSocialLinks|null find($id, $lockMode = null, $lockVersion = null)
 * @method JobseekerSocialLinks|null findOneBy(array $criteria, array $orderBy = null)
 * @method JobseekerSocialLinks[]    findAll()
 * @method JobseekerSocialLinks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobseekerSocialLinksRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, JobseekerSocialLinks::class);
    }

//    /**
//     * @return JobseekerSocialLinks[] Returns an array of JobseekerSocialLinks objects
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
    public function findOneBySomeField($value): ?JobseekerSocialLinks
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
