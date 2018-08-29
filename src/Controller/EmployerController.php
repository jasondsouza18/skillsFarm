<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/employer")
 */
class EmployerController extends AbstractController
{
    /**
     * @Route("/login", name="_employer_login")
     */
    public function index(Request $request, AuthenticationUtils $authenticationUtils)
    {
        $request = $request->request->all();
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('employer/login.html.twig', array(
            'last_username' => $lastUsername,
            'error' => $error,
        ));

    }
}
