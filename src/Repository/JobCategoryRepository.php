<?php

namespace App\Repository;

use App\Entity\JobCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method JobCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method JobCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method JobCategory[]    findAll()
 * @method JobCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobCategoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, JobCategory::class);
    }


    public function gethejobtype($job)
    {
        $jobCategory = self::findOneBy(array('job'=>$job));
        return $jobCategory->getMastercategory()->getId();
    }
}
