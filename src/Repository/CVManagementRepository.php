<?php

namespace App\Repository;

use App\Entity\CVManagement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CVManagement|null find($id, $lockMode = null, $lockVersion = null)
 * @method CVManagement|null findOneBy(array $criteria, array $orderBy = null)
 * @method CVManagement[]    findAll()
 * @method CVManagement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CVManagementRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CVManagement::class);
    }

    public function addIntoTabledata($jobseeker, $fileName, $uploadsdrirectory, $request,$category)
    {
        $dm = $this->getEntityManager();
        $cvmanage = new CVManagement();
        $cvmanage->setJobseeker($jobseeker);
        $cvmanage->setCategory($category);
        $cvmanage->setCvname($fileName);
        $cvmanage->setCvpath($uploadsdrirectory);
        $dm->persist($cvmanage);
        $dm->flush($cvmanage);
        return $cvmanage;
    }
}
