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

    public function addintoEducation($result, $masterEducation, $jobseeker, $oldid)
    {
        $dm = $this->getEntityManager();
        $addEducation = self::findOneBy(array('jobseeker' => $jobseeker->getId(), 'mastereducation' => $oldid));
        if (!($addEducation instanceof JobseekerEducation))
            $addEducation = new JobseekerEducation();
        $addEducation->setJobseeker($jobseeker);
        $addEducation->setItPassedoutyear($result['passoutyear']);
        $addEducation->setMastereducation($masterEducation);
        $addEducation->setVcCoursename($result['coursename']);
        $addEducation->setItPercentage($result['percentage']);
        $dm->persist($addEducation);
        $dm->flush($addEducation);
        return $addEducation;
    }
}
