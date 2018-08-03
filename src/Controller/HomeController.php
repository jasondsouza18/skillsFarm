<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class HomeController extends Controller
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/contactus", name="contactus")
     */
    public function contactus(\Swift_Mailer $mailer)
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
