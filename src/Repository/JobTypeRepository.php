<?php

namespace App\Repository;

use App\Entity\JobType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method JobType|null find($id, $lockMode = null, $lockVersion = null)
 * @method JobType|null findOneBy(array $criteria, array $orderBy = null)
 * @method JobType[]    findAll()
 * @method JobType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, JobType::class);
    }

    public function gethejobtype($job)
    {
        $jobtype = self::findOneBy(array('job' => $job));
        return $jobtype->getMasterjobtype()->getId();
    }
}
