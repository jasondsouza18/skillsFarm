<?php

namespace App\Controller;

use App\Entity\JobApplication;
use App\Entity\Jobseeker;
use App\Entity\Job;
use App\Entity\Employer;
use App\Entity\JobseekerResume;
use App\Entity\MasterCategory;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ContactUsType;


class HomeController extends Controller {
	/**
	 * @Route("/home", name="_home")
	 */
	public function index( Request $request, AuthenticationUtils $authenticationUtils ) {
		$sent           = $request->query->get( 'sent' );
		$request        = $request->request->all();
		$error          = $authenticationUtils->getLastAuthenticationError();
		$lastUsername   = $authenticationUtils->getLastUsername();
		$category       = $this->getDoctrine()->getRepository( MasterCategory::class )->findAll();
		$jobfeatured    = $this->getDoctrine()->getRepository( Job::class )->getJobRecommendationsfeatured();
		$jobrecent      = $this->getDoctrine()->getRepository( Job::class )->getJobRecommendationsrecent();
		$jobtop         = $this->getDoctrine()->getRepository( Job::class )->getJobRecommendationstop();
		$jobmostapplied = $this->getDoctrine()->getRepository( Job::class )->getJobRecommendationsmostapplied();
		$rss            = simplexml_load_file( 'https://skillsfarm.in/blogs/rss/' );
		return $this->render( 'home/index.html.twig', array(
			'last_username'  => $lastUsername,
			'sent'           => $sent,
			'error'          => $error,
			'category'       => $category,
			'jobfeatured'    => $jobfeatured,
			'jobrecent'      => $jobrecent,
			'jobtop'         => $jobtop,
			'jobmostapplied' => $jobmostapplied,
			'rss'            => $rss
		) );

	}

	/**
	 * @Route("/contactus", name="_contactus")
	 */
	public function contactus( Request $request, \Swift_Mailer $mailer ) {
		$form = $this->createForm( ContactUsType::class );
		$form->handleRequest( $request );
		$sent = 0;
		if ( $form->isSubmitted() && $form->isValid() ) {
			// data is an array with "name", "email", and "message" keys
			$data    = $form->getData();
			$message = ( new \Swift_Message( 'Skills Farm' ) )
				->setSubject( 'Contact me  - Skillsfarm' )
				->setFrom( 'skillsfarmindia@gmail.com' )
				->setTo( 'shyjunair2018@gmail.com' )
				->setCc( [ '20angelgeo@gmail.com', 'jasondsouza717@gmail.com' ] )
				->setBody( "Name - " . $data['vc_name'] . PHP_EOL . "Email - " . $data['vc_email'] . PHP_EOL
				           . "Subject -" . $data['vc_subject'] . PHP_EOL . " Message - " . PHP_EOL . $data['vc_message'] . PHP_EOL
				);
			$sent    = $mailer->send( $message );
		}

		return $this->render( 'home/contactus.html.twig', array(
			'form' => $form->createView(),
			'sent' => $sent
		) );
	}

	/**
	 * @Route("/aboutus", name="_aboutus")
	 */
	public function aboutus() {
		return $this->render( 'home/aboutus.html.twig' );
	}

	/**
	 * @Route("/general", name="_general")
	 */
	public function general( Request $request, \Swift_Mailer $mailer ) {
		$sent = 0;
		if ( $request->getMethod() == 'POST' ) {
			$projectRoot      = $this->get( 'kernel' )->getProjectDir();
			$uploadsDirectory = $projectRoot . "/public/uploads/general/Resumes/";
			$file             = $request->files->get( 'fileupload' );
			$fileName         = $file->getClientOriginalName();
			$file->move( $uploadsDirectory, $fileName );
			$request = $request->request->all();
			if ( $request['selectcategory'] == 1 ) {
				$category = "School Teacher";
			} else if ( $request['selectcategory'] == 2 ) {
				$category = "College Teacher";
			} else if ( $request['selectcategory'] == 3 ) {
				$category = "Software Engineer";
			} else if ( $request['selectcategory'] == 4 ) {
				$category = "Counseling";
			} else if ( $request['selectcategory'] == 5 ) {
				$category = "Developer";
			}
			$message       = " SkillsFarm Update" . PHP_EOL . "Name = " . $request['name'] . PHP_EOL .
			                 "Email = " . $request['Email'] . PHP_EOL .
			                 "Phone number = " . $request['number'] . PHP_EOL .
			                 "stream = " . $request['Stream'] . PHP_EOL .
			                 "place = " . $request['Place'] . PHP_EOL .
			                 "website = " . $request['website'] . PHP_EOL .
			                 "cover letter  = " . $request['cover'] . PHP_EOL .
			                 "Resume name = " . $fileName . PHP_EOL .
			                 "Category Selected = " . $category . PHP_EOL;
			$messagetosend = ( new \Swift_Message( 'Skills Farm' ) )
				->setSubject( "General Form - Skillsfarm" )
				->setFrom( 'skillsfarmindia@gmail.com' )
				->setTo( 'shyjunair2018@gmail.com' )
				->setCc( [ '20angelgeo@gmail.com', 'jasondsouza717@gmail.com' ] )
				->setBody( $message )
				->attach( \Swift_Attachment::fromPath( $uploadsDirectory . $fileName ) );
			$sent          = $mailer->send( $messagetosend );
		}
		$category = $this->getDoctrine()->getRepository( MasterCategory::class )->findAll();

		return $this->render( 'home/generalform.html.twig', array(
			'sent'     => $sent,
			'category' => $category
		) );
	}

	/**
	 * @Route("/notify", name="_notify")
	 */
	public function notifyus( Request $request, \Swift_Mailer $mailer ) {
		if ( $request->getMethod() == 'POST' ) {
			$request = $request->request->all();
			if ( $request['string'] == "a@3212's[]asdo[{&*^&*" ) {
				$message       = "Asked us to contact this email -" . PHP_EOL . $request['email'];
				$messagetosend = ( new \Swift_Message( 'Skills Farm' ) )
					->setSubject( "Contact me - Skillsfarm" )
					->setFrom( 'skillsfarmindia@gmail.com' )
					->setTo( 'shyjunair2018@gmail.com' )
					->setCc( [ '20angelgeo@gmail.com', 'jasondsouza717@gmail.com' ] )
					->setBody( $message );
				$sent          = $mailer->send( $messagetosend );
			}
		}

		return new JsonResponse( "1" );
	}

	/**
	 * @Route("/changepassword/{id}/{rand}/{random}", name="_changepassword")
	 */
	public function changepassword( Request $request, $id, $rand, $random = 0, UserPasswordEncoderInterface $passwordEncoder ) {
		if ( $request->getMethod() == 'POST' ) {
			$request = $request->request->all();
			$random  = self::generateRandomString();
			if ( $request['password'] != $request['reenterpassword'] ) {
				return $this->render( 'home/forgotpassword.html.twig', array(
					'id'     => $id,
					'rand'   => $rand,
					'random' => $random
				) );
			}
			$jobseeker = $this->getDoctrine()->getRepository( Jobseeker::class )->findOneBy( [ 'id' => $id ] );
			if ( ! ( $jobseeker instanceof Jobseeker ) ) {
				$sent = "inactive";

				return $this->redirectToRoute( '_home', array( 'sent' => $sent ) );
			}
			$password = $request['password'];
			$password = $passwordEncoder->encodePassword( $jobseeker, $password );
			$jobseeker->setVcPassword( $password );
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->persist( $jobseeker );
			$entityManager->flush( $jobseeker );
			$sent = "passwordchanged";

			return $this->redirectToRoute( '_home', array( 'sent' => $sent ) );
		}

		return $this->render( 'home/forgotpassword.html.twig', array(
			'id'     => $id,
			'rand'   => $rand,
			'random' => $random
		) );
	}

	/**
	 * @Route("/forgotpassword", name="_jobseeker_forgotpassword")
	 */
	public function forgotpassword( Request $request, \Swift_Mailer $mailer ) {
		if ( $request->getMethod() == 'POST' ) {
			$request   = $request->request->all();
			$email     = $request['email'];
			$jobseeker = $this->getDoctrine()->getRepository( Jobseeker::class )->findOneBy( [
				'vc_login' => $request['username'],
				'vc_email' => $email
			] );
			if ( ! ( $jobseeker instanceof Jobseeker ) ) {
				$sent = "jobseekernotfound";

				return $this->redirectToRoute( '_home', array( 'sent' => $sent ) );
			}
			$rand          = self::generateRandomString( 10 );
			$link          = "http://127.0.0.3/changepassword/" . $jobseeker->getId() . "/$rand";
			$messagetosend = ( new \Swift_Message( 'Skills Farm' ) )
				->setSubject( 'Forgot Password - Skillsfarm' )
				->setFrom( 'skillsfarmindia@gmail.com' )
				->setTo( $email )
				->setBcc( [ '20angelgeo@gmail.com', 'jasondsouza717@gmail.com' ] )
				->setBody(
					$this->renderView(
					// templates/emails/registration.html.twig
						'emails/forgotpassword.html.twig',
						array( 'link' => $link )

					),
					'text/html'
				);
			$sent          = $mailer->send( $messagetosend );
			$sent          = "emailsent";

			return $this->redirectToRoute( '_home', array( 'sent' => $sent ) );
		}
	}

	public function generateRandomString( $length = 10 ) {
		$characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen( $characters );
		$randomString     = '';
		for ( $i = 0; $i < $length; $i ++ ) {
			$randomString .= $characters[ rand( 0, $charactersLength - 1 ) ];
		}

		return $randomString;
	}


	/**
	 * Search Job Action(Important)
	 * @Route("/search", name="_job_search")
	 */
	public function search( Request $request ) {
		$session       = $request->getSession();
		$paginator     = $this->get( 'knp_paginator' );//Initiates the KNP panginator
		$requestResult = $request->request->all();
		$em            = $this->getDoctrine()->getManager();
		$searchSession = $session->get( 'searchsession' );
		if ( count( $requestResult ) > 0 ) {
			$session->set( 'searchsession', $requestResult );
		} else if ( is_null( $searchSession ) && ( ! ( is_null( $requestResult ) ) ) ) {
			$session->set( 'searchsession', $requestResult );
		} else {
			$requestResult = $session->get( 'searchsession' );
		}
		try {
			$jobSearchParameters = self::getSearchParameters( $requestResult );//Get all Search Parameters in a Single Array
			$jobSearchQuery      = $this->getDoctrine()->getRepository( Job::class )->findJobResults( $jobSearchParameters );        //Find the acccurate Jobs, Search Qquery Returned
		} catch ( \Exception $e ) {
			var_dump( $e->getMessage() );
			die;
		}
		$query      = $em->createQuery( $jobSearchQuery );
		$pagination = $paginator->paginate( $query, $request->query->getInt( 'page', 1 ), 10 );
		$category   = $this->getDoctrine()->getRepository( MasterCategory::class )->findAll();

		return $this->render( 'home/jobsearch.html.twig', array(
			'pagination'       => $pagination,
			'sent'             => 0,
			'searchparameters' => $requestResult,
			'category'         => $category
		) );
	}

	public function getSearchParameters( $request ) {
		$result = array(
			'keyword'   => $request['keyword'],
			'location'  => $request['location'],
			'county'    => $request['county'],
			'country'   => $request['country'],
			'latitude'  => $request['latitude'],
			'longitude' => $request['longitude'],
			'startdate' => $request['startdate'],
			'enddate'   => $request['enddate'],
			'isCountry' => $request['isCountry'],
			'category'  => $request['category'],
			'radius'    => $request['radius']
		);

		return $result;
	}

	/**
	 * @Route("/description/{id}", name="_job_description")
	 */
	public function description( Request $request, $id ) {
		try {
			$job = $this->getDoctrine()->getRepository( Job::class )->find( $id );
			if ( ! $job ) {
				throw $this->createNotFoundException( 'No Job found for id ' . $id );
			}
			$employer = $this->getDoctrine()->getRepository( Employer::class )->find( $job->getEmployerId() );
		} catch ( \Exception $e ) {
			var_dump( $e->getMessage() );
			die;
		}

		return $this->render( 'home/jobdescription.html.twig', array(
			'job'      => $job,
			'employer' => $employer,
			'sent'     => 0
		) );
	}

	/**
	 * @Route("/apply/{id}", name="_job_apply")
	 */
	public function apply( Request $request, $id, \Swift_Mailer $mailer ) {
		$job      = $this->getDoctrine()->getRepository( Job::class )->find( $id );
		$employer = $this->getDoctrine()->getRepository( Employer::class )->find( $job->getEmployerId() );
		if ( $request->getMethod() == 'POST' ) {
			$entityManager = $this->getDoctrine()->getManager();
			$isSignedIn    = 0;
			$jobseeker     = $this->getUser();
			if ( $jobseeker != null ) {
				$isSignedIn = 1;
			}
			$projectRoot      = $this->get( 'kernel' )->getProjectDir();
			$uploadsDirectory = $projectRoot . "/public/uploads/applied/jobs/";
			$file             = $request->files->get( 'fileupload' );
			$fileName         = $file->getClientOriginalName();
			$file->move( $uploadsDirectory, $fileName );
			$request        = $request->request->all();
			$jobApplication = new JobApplication();
			$jobApplication->setBoIssignedin( $isSignedIn );
			$jobApplication->setVcFirstname( $request['name'] );
			$jobApplication->setVcSurname( $request['name'] );
			$jobApplication->setBoTrackapplication( 1 );
			$jobApplication->setJob( $job );
			$jobApplication->setItApplicationmethod( 1 );
			$jobApplication->setVcApplicantemailaddress( $request['Email'] );
			$jobApplication->setJobseeker( $jobseeker );
			$entityManager->persist( $jobApplication );
			$entityManager->flush( $jobApplication );
			$message       = " SkillsFarm Update" . PHP_EOL . "Name = " . $request['name'] . PHP_EOL .
			                 "Email = " . $request['Email'] . PHP_EOL .
			                 "Phone number = " . $request['number'] . PHP_EOL .
			                 "cover letter  = " . $request['cover'] . PHP_EOL .
			                 "Resume name = " . $fileName . PHP_EOL;
			$messagetosend = ( new \Swift_Message( 'Skills Farm' ) )
				->setFrom( 'skillsfarmindia@gmail.com' )
				->setTo( $request['Email'] )
				->setBcc( [ '20angelgeo@gmail.com', 'jasondsouza717@gmail.com' ] )
				->setBody( $message )
				->attach( \Swift_Attachment::fromPath( $uploadsDirectory . $fileName ) );
			//  $sent = $mailer->send($messagetosend);
		}

		return $this->render( 'home/applyjob.html.twig', array(
			'job'  => $job,
			'sent' => 0
		) );
	}

}
