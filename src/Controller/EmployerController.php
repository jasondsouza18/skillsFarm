<?php

namespace App\Controller;

use App\Entity\CompanyProfile;
use App\Entity\Employer;
use App\Entity\Job;
use App\Entity\JobCategory;
use App\Entity\MasterCategory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;


/**
 * @Route("/employer")
 */
class EmployerController extends AbstractController
{
    /**
     * @Route("/", name="_employer_home")
     */
    public function home(Request $request)
    {
        return $this->render('employer/index.html.twig', array('message' => 0));
    }

    /**
     * @Route("/login", name="_employer_login")
     */
    public function login(Request $request, AuthenticationUtils $authenticationUtils)
    {
        $message = $request->query->get('message');
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('employer/login.html.twig', array(
            'last_username' => $lastUsername,
            'error' => $error,
            'message' => $message,
        ));
    }

    /**
     * @Route("/logout", name="_employer_logout")
     */
    public function logout(Request $request)
    {
    }

    /**
     * @Route("/signup", name="_employer_signup")
     */
    public function signup(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $employer = $this->getUser();
        if ($employer != null)
            return $this->render('employer/index.html.twig');
        if ($request->getMethod() == "POST") {
            $employer = new Employer();
            $password = $request->request->get('pass');
            $repassword = $request->request->get('re-password');
            $firstname = $request->request->get('name');
            $email = $request->request->get('email');
            $login = $request->request->get('login');
            $res = $this->getDoctrine()->getRepository(Employer::class)->validatePassword($password, $repassword);
            if ($res != true)
                return $this->redirectToRoute('_employer_login', array('message' => $res));
            $res = $this->getDoctrine()->getRepository(Employer::class)->validateEmployerloginandEmail($login, $email);
            if ($res != true) {
                return $this->redirectToRoute('_employer_login', array('message' => $res));
            } else {
                $password = $passwordEncoder->encodePassword($employer, $password);
                $entityManager = $this->getDoctrine()->getManager();
                $employer->setVcPassword($password);
                $employer->setVcLogin($login);
                $employer->setVcName($firstname);
                $employer->setVcEmail($email);
                $entityManager->persist($employer);
                $entityManager->flush($employer);
                $sent = "Successfully registered. Kindly Login Now";
                return $this->redirectToRoute('_employer_login', array('message' => $sent));
            }
        }
    }

    /**
     * @Route("/home", name="_employer_index")
     */
    public function index(Request $request)
    {
        $employer = $this->getUser();
        $jobs = $this->getDoctrine()->getRepository(Job::class)->findBy(array('employer' => $employer->getId()));
        $company = $this->getDoctrine()->getRepository(Job::class)->findBy(array('employer' => $employer->getId()));
        return $this->render('employer/home.html.twig', array(
            'jobs' => $jobs,
            'company' => $company
        ));
    }

    /**
     * @Route("/companyprofile", name="_employer_company")
     */
    public function companyedit(Request $request)
    {
        if ($request->getMethod() == "POST") {
            $entityManager = $this->getDoctrine()->getManager();
            $employer = $this->getUser();
            $request = $request->request->all();
            $companyProfile = $this->getDoctrine()->getRepository(CompanyProfile::class)->findBy(array('employer' => $employer->getId()));
            if (!($companyProfile instanceof CompanyProfile))
                $companyProfile = new CompanyProfile();
            $companyProfile->setEmployer($employer);
            $companyProfile->setVcCompanyURL($request['companyurl']);
            $companyProfile->setVcName($request['companyname']);
            $companyProfile->setVcDescription($request['companydescription']);
            $companyProfile->setVcFacebook($request['facebook']);
            $companyProfile->setVcLinkedIn($request['linkedin']);
            $companyProfile->setVcTwitter($request['twitter']);
            $companyProfile->setVcImagepath($request['Background']);
            $companyProfile->setVcUrl($employer->getID() . "/" . $request['companyname']);
            $companyProfile->setVcVideoURL($request['videourl']);
            $entityManager->persist($companyProfile);
            $entityManager->flush($companyProfile);
        }
        return $this->redirectToRoute('_employer_index');
    }

    /**
     * @Route("/add/job/{id}", name="_employer_addjob")
     */
    public function addjob(Request $request, $id = 0)
    {
        $job = "";
        if ($id != 0)
            $job = $this->getDoctrine()->getRepository(Job::class)->find($id);
        if ($request->getMethod() == "POST") {
            $entityManager = $this->getDoctrine()->getManager();
            $employer = $this->getUser();
            $request = $request->request->all();
            $category = $request['category'];
            $id = $request['idjob'];
            if ($id == 0)
                $job = new Job();
            else
                $job = $this->getDoctrine()->getRepository(Job::class)->find($id);
            $job->setVcShortheadline($request['sheadline']);
            $job->setVcLongheadline($request['lheadline']);
            $job->setVcDescription($request['description']);
            $job->setEmployer($employer);
            $job->setDtApplicationdeadlinedate(new \DateTime($request['deadline']));
            $job->setBoIsabroad($request['isCountry']);
            $job->setDbLatitude($request['latitude']);
            $job->setVcSalarydescription($request['salary']);
            $job->setVcLocationdetails($request['location']);
            $job->setDbLongitude($request['longitude']);
            $job->setVcCountry($request['country']);
            $job->setVcApplyemail($request['email']);
            $job->setDtEnddate(new \DateTime($request['edate']));
            $job->setDtLivedate(new \DateTime($request['sdate']));
            $job->getVcKeywords($request['keywords']);
            $job->setItStatus(1);
            $entityManager->persist($job);
            $entityManager->flush($job);
            $jobcategory = $this->getDoctrine()->getRepository(JobCategory::class)->findOneBy(array('job' => $id));
            if (!($jobcategory instanceof JobCategory))
                $jobcategory = new JobCategory();
            $jobcategory->setJob($job);
            $masterCategory = $this->getDoctrine()->getRepository(MasterCategory::class)->find($category);
            $jobcategory->setMastercategory($masterCategory);
            $entityManager->persist($jobcategory);
            $entityManager->flush($jobcategory);
        }
        $category = $this->getDoctrine()->getRepository(MasterCategory::class)->findAll();
        return $this->render('employer/addjob.html.twig', array(
            'job' => $job,
            'category' => $category,
            'id' => $id
        ));
    }

}
