<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ContactUsType;



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
        $form = $this->createForm(ContactUsType::class);
        return $this->render('home/contactus.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/aboutus", name="_aboutus")
     */
    public function aboutus(\Swift_Mailer $mailer)
    {
        $name = 'jason';
        $message = (new \Swift_Message('Hello Email'))
        ->setFrom('jason.vinod@techjini.com')
        ->setTo('jason.vinod@techjini.com')
        ->setBody(
            $this->renderView(
                // templates/emails/registration.html.twig
                'base.html.twig',
                array('name' => $name)
            ),
            'text/html'
        )
        /*
         * If you also want to include a plaintext version of the message
        ->addPart(
            $this->renderView(
                'emails/registration.txt.twig',
                array('name' => $name)
            ),
            'text/plain'
        )
        */
    ;

     echo  $mailer->send($message);die;

        echo "hi";
        die;
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
