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

    public function addintoMasterEducation($result)
    {
        $dm = $this->getEntityManager();
        $masterEducation = self::findOneBy(['vc_name' => $result['name'], 'vc_locationdetails' => $result['location'], 'it_educationtype' => $result['type']]);
        if ($masterEducation instanceof MasterEducation)
            return $masterEducation;
        $masterEducation = new MasterEducation();
        $masterEducation->setItEducationtype($result['type']);
        $masterEducation->setVcName($result['name']);
        $masterEducation->setDbLatitude($result['latitude']);
        $masterEducation->setDbLongitude($result['longitude']);
        $masterEducation->setVcLocationdetails($result['location']);
        $dm->persist($masterEducation);
        $dm->flush($masterEducation);
        return $masterEducation;
    }
}
