<?php

namespace App\Repository;

use App\Entity\Employer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Employer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Employer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Employer[]    findAll()
 * @method Employer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Employer::class);
    }

    public function validateEmployerloginandEmail($login, $email)
    {
        $email = self::findOneBy(array('vc_email' => $email));
        if ($email instanceof Jobseeker)
            return "Email ID already exists. Kindly Use other Email";
        $login = self::findOneBy(array('vc_login' => $login));
        if ($login instanceof Jobseeker)
            return "Username alreay exists. Kindly Use other username";
        return true;
    }

    public function validatePassword($password,$repassword)
    {
        if($password != $repassword)
            return "Password Doesn't match";
        return true;
    }
}
