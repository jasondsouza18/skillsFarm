<?php

namespace App\Controller;

use App\Entity\Jobseeker;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ContactUsType;


class HomeController extends Controller
{
    /**
     * @Route("/home", name="_home")
     */
    public function index(Request $request, AuthenticationUtils $authenticationUtils)
    {
        $sent = $request->query->get('sent');
        $request = $request->request->all();
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('home/index.html.twig', array(
            'last_username' => $lastUsername,
            'sent' => $sent,
            'error' => $error,
        ));

    }

    /**
     * @Route("/contactus", name="_contactus")
     */
    public function contactus(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactUsType::class);
        $form->handleRequest($request);
        $sent = 0;
        if ($form->isSubmitted() && $form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $data = $form->getData();
            $message = (new \Swift_Message('Skills Farm'))
                ->setFrom('skillsfarmindia@gmail.com')
                ->setTo('jasondsouza717@gmail.com')
                ->setCc('josephjeffry2@gmail.com')
                ->setBody("Name - " . $data['vc_name'] . PHP_EOL . "Email - " . $data['vc_email'] . PHP_EOL
                    . "Subject -" . $data['vc_subject'] . PHP_EOL . " Message - " . PHP_EOL . $data['vc_message'] . PHP_EOL
                );
            $sent = $mailer->send($message);
        }
        return $this->render('home/contactus.html.twig', array(
            'form' => $form->createView(),
            'sent' => $sent
        ));
    }

    /**
     * @Route("/aboutus", name="_aboutus")
     */
    public function aboutus()
    {
        return $this->render('home/aboutus.html.twig');
    }

    /**
     * @Route("/general", name="_general")
     */
    public function general(Request $request, \Swift_Mailer $mailer)
    {
        $sent = 0;
        if ($request->getMethod() == 'POST') {
            $projectRoot = $this->get('kernel')->getProjectDir();
            $uploadsDirectory = $projectRoot . "/public/uploads/general/Resumes/";
            $file = $request->files->get('fileupload');
            $fileName = $file->getClientOriginalName();
            $file->move($uploadsDirectory, $fileName);
            $request = $request->request->all();
            if ($request['selectcategory'] == 1)
                $category = "School Teacher";
            else if ($request['selectcategory'] == 2)
                $category = "College Teacher";
            else if ($request['selectcategory'] == 3)
                $category = "Software Engineer";
            else if ($request['selectcategory'] == 4)
                $category = "Counseling";
            else if ($request['selectcategory'] == 5)
                $category = "Developer";
            $message = " SkillsFarm Update" . PHP_EOL . "Name = " . $request['name'] . PHP_EOL .
                "Email = " . $request['Email'] . PHP_EOL .
                "Phone number = " . $request['number'] . PHP_EOL .
                "stream = " . $request['Stream'] . PHP_EOL .
                "place = " . $request['Place'] . PHP_EOL .
                "website = " . $request['website'] . PHP_EOL .
                "cover letter  = " . $request['cover'] . PHP_EOL .
                "Resume name = " . $fileName . PHP_EOL .
                "Category Selected = " . $category . PHP_EOL;
            $messagetosend = (new \Swift_Message('Skills Farm'))
                ->setFrom('skillsfarmindia@gmail.com')
                ->setTo('jasondsouza717@gmail.com')
                ->setCc('josephjeffry2@gmail.com')
                ->setBody($message)
                ->attach(\Swift_Attachment::fromPath($uploadsDirectory . $fileName));
            $sent = $mailer->send($messagetosend);
        }
        return $this->render('home/generalform.html.twig', array(
            'sent' => $sent
        ));
    }

    /**
     * @Route("/notify", name="_notify")
     */
    public function notifyus(Request $request, \Swift_Mailer $mailer)
    {
        if ($request->getMethod() == 'POST') {
            $request = $request->request->all();
            if ($request['string'] == "a@3212's[]asdo[{&*^&*") {
                $message = "Asked us to contact this email" . $request['email'];
                $messagetosend = (new \Swift_Message('Skills Farm'))
                    ->setFrom('skillsfarmindia@gmail.com')
                    ->setTo('jasondsouza717@gmail.com')
                    ->setCc('josephjeffry2@gmail.com')
                    ->setBody($message);
                $sent = $mailer->send($messagetosend);
            }
        }
        return new JsonResponse("1");
    }

    /**
     * @Route("/changepassword/{id}/{rand}/{random}", name="_changepassword")
     */
    public function changepassword(Request $request, $id, $rand,$random=0, UserPasswordEncoderInterface $passwordEncoder)
    {
        if ($request->getMethod() == 'POST') {
            $request = $request->request->all();
            $random = self::generateRandomString();
            if($request['password'] != $request['reenterpassword'])
            {
                return $this->render('home/forgotpassword.html.twig', array('id' => $id, 'rand' => $rand,'random'=>$random));
            }
            $jobseeker = $this->getDoctrine()->getRepository(Jobseeker::class)->findOneBy(['id' => $id]);
            if(!($jobseeker instanceof Jobseeker))
            {
                $sent = "inactive";
                return $this->redirectToRoute('_home', array('sent' => $sent));
            }
            $password = $request['password'];
            $password = $passwordEncoder->encodePassword($jobseeker, $password);
            $jobseeker->setVcPassword($password);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($jobseeker);
            $entityManager->flush($jobseeker);
            $sent = "passwordchanged";
            return $this->redirectToRoute('_home', array('sent' => $sent));
        }
        return $this->render('home/forgotpassword.html.twig', array('id' => $id, 'rand' => $rand,'random'=>$random));
    }

    /**
     * @Route("/forgotpassword", name="_jobseeker_forgotpassword")
     */
    public function forgotpassword(Request $request, \Swift_Mailer $mailer)
    {
        if ($request->getMethod() == 'POST') {
            $request = $request->request->all();
            $email = $request['email'];
            $jobseeker = $this->getDoctrine()->getRepository(Jobseeker::class)->findOneBy(['vc_login' => $request['username'],'vc_email'=>$email]);
            if(!($jobseeker instanceof Jobseeker))
            {
                $sent = "jobseekernotfound";
                return $this->redirectToRoute('_home', array('sent' => $sent));
            }
            $rand = self::generateRandomString(10);
            $link = "http://127.0.0.3/changepassword/" . $jobseeker->getId() . "/$rand";
            $messagetosend = (new \Swift_Message('Skills Farm'))
                ->setFrom('skillsfarmindia@gmail.com')
                ->setTo($email)
                ->setBody(
                    $this->renderView(
                    // templates/emails/registration.html.twig
                        'emails/forgotpassword.html.twig',
                        array('link' => $link)

                    ),
                    'text/html'
                );
            $sent = $mailer->send($messagetosend);
            $sent = "emailsent";
            return $this->redirectToRoute('_home', array('sent' => $sent));
        }
    }

    public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}
