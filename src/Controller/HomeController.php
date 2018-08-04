<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;



class HomeController extends Controller
{
    /**
     * @Route("/home", name="_home")
     */
    public function index(Request $request, AuthenticationUtils $authenticationUtils)
    {

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('home/index.html.twig', array(
            'last_username' => $lastUsername,
            'error' => $error,
        ));

    }

    /**
     * @Route("/contactus", name="_contactus")
     */
    public function contactus()
    {
        return $this->render('home/contactus.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/aboutus", name="_aboutus")
     */
    public function aboutus()
    {
        return $this->render('home/aboutus.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    
    /**
     * @Route("/job/details", name="_jobdetails")
     */
    public function jobdetails()
    {
        return $this->render('home/aboutus.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
