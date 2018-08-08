<?php

namespace App\Controller;

use App\Form\EditProfileType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Jobseeker;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


/**
 * @Route("/jobseeker")
 */
class JobseekerController extends Controller
{

    /**
     * @Route("/signup", name="_jobseeker_signup")
     * @author Jason Vinod Dsouza<jason.vinod@techjini.com>
     */
    public function signup(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $jobseeker = $this->getUser();
        if ($jobseeker != null)
            return $this->render('index.html.twig');
        if ($request->getMethod() == "POST") {
            $jobseeker = new Jobseeker();
            $password = $request->request->get('pass');
            $firstname = $request->request->get('firstname');
            $surname = $request->request->get('lastname');
            $email = $request->request->get('email');
            $login = $request->request->get('login');
            $password = $passwordEncoder->encodePassword($jobseeker, $password);
            $entityManager = $this->getDoctrine()->getManager();
            $jobseeker->setVcPassword($password);
            $jobseeker->setVcLogin($login);
            $jobseeker->setVcFirstname($firstname);
            $jobseeker->setVcSurname($surname);
            $jobseeker->setVcEmail($email);
            $jobseeker->setItJobseekerstatus(1);
            $jobseeker->setBoSubscriptionletter(1);
            $entityManager->persist($jobseeker);
            $entityManager->flush($jobseeker);
            return $this->redirectToRoute('_jobseeker_home');
        }
    }


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
    public function profileedit(Request $request)
    {
        $jobseeker = $this->getUser();
        $editjobseeker = $this->createForm(EditProfileType::class, $jobseeker);
        $editjobseeker->handleRequest($request);
        if ($editjobseeker->isSubmitted() && $editjobseeker->isValid()) {echo "hi";
                dump($editjobseeker->getData());die;
        }
        return $this->render('jobseeker/editProfile.html.twig', [
            'form' => $editjobseeker->createView(),
        ]);
    }


    /**
     * @Route("/logout", name="_jobseeker_logout")
     * @author Jason Vinod Dsouza<jason.vinod@techjini.com>
     */
    public function logout(Request $request)
    {
    }

}
