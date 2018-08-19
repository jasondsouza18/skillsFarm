<?php

namespace App\Repository;

use App\Entity\Jobseeker;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Jobseeker|null find($id, $lockMode = null, $lockVersion = null)
 * @method Jobseeker|null findOneBy(array $criteria, array $orderBy = null)
 * @method Jobseeker[]    findAll()
 * @method Jobseeker[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobseekerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Jobseeker::class);
    }


    public function validateLoginandEmail($login, $email)
    {
        $emailJobseeker = self::findOneBy(array('vc_email' => $email));
        if ($emailJobseeker instanceof Jobseeker)
            return "Email";
        $loginJobseeker = self::findOneBy(array('vc_login' => $login));
        if ($loginJobseeker instanceof Jobseeker)
            return "Login";
        return "true";
     }

}
