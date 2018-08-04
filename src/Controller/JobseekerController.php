<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Jobseeker;



/**
 * @Route("/jobseeker")
 */
class JobseekerController extends Controller
{
    /**
     * @Route("/home", name="_jobseeker_home")
     */
    public function index()
    {
        return $this->render('jobseeker/index.html.twig', [
            'controller_name' => 'JobseekerController',
        ]);
    }

    /**
     * @Route("/profile/edit", name="_jobseeker_profile_edit")
     */
    public function profileedit()
    {
        return $this->render('jobseeker/createprofile.html.twig', [
            'controller_name' => 'JobseekerController',
        ]);
    }

        /**
     * @Route("/profile", name="_jobseeker_profile")
     */
    public function profile()
    {
        return $this->render('jobseeker/createprofile.html.twig', [
            'controller_name' => 'JobseekerController',
        ]);
    }
}
