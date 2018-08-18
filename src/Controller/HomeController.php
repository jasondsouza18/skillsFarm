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
    public function contactus(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactUsType::class);
        $form->handleRequest($request);
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
            $mailer->send($message);
        }
        return $this->render('home/contactus.html.twig', array(
            'form' => $form->createView(),
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
            $message = " SkillsFarm Update" . PHP_EOL . "Name = " . $request['name'] . PHP_EOL .
                "Email = " . $request['Email'] . PHP_EOL .
                "Phone number = " . $request['number'] . PHP_EOL .
                "stream = " . $request['Stream'] . PHP_EOL .
                "place = " . $request['Place'] . PHP_EOL .
                "website = " . $request['website'] . PHP_EOL .
                "cover letter  = " . $request['cover'] . PHP_EOL .
                "Resume name = " . $fileName;
            $messagetosend = (new \Swift_Message('Skills Farm'))
                ->setFrom('skillsfarmindia@gmail.com')
                ->setTo('jasondsouza717@gmail.com')
                ->setCc('josephjeffry2@gmail.com')
                ->setBody($message)
                ->attach(\Swift_Attachment::fromPath($uploadsDirectory . $fileName));
            $sent= $mailer->send($messagetosend);
        }
        return $this->render('home/generalform.html.twig', array(
            'sent' => $sent
        ));
    }
}
