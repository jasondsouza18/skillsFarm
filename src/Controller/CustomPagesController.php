<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/page")
 */
class CustomPagesController extends Controller
{
    /**
     * @Route("/softskills", name="custom_softskills")
     */
    public function softskills()
    {
        return $this->render('custom_pages/softskills.html.twig');
    }

    /**
     * @Route("/career", name="custom_careercounselling")
     */
    public function career()
    {
        return $this->render('custom_pages/careercounselling.html.twig');
    }

    /**
     * @Route("/communicationskills", name="custom_communicationskills")
     */
    public function communicationskills()
    {
        return $this->render('custom_pages/communicationskills.html.twig');
    }

    /**
     * @Route("/psychologicalcounseling", name="custom_psychologicalcounseling")
     */
    public function psychologicalcounseling()
    {
        return $this->render('custom_pages/psychologicalcounseling.html.twig');
    }


    /**
     * @Route("/facultytraining", name="custom_facultytraining")
     */
    public function facultytraining()
    {
        return $this->render('custom_pages/facultytraining.html.twig');
    }

    /**
     * @Route("/placementservices", name="custom_placementservices")
     */
    public function placementservices()
    {
        return $this->render('custom_pages/placementservices.html.twig');
    }

    /**
     * @Route("/schoolaffiliation", name="custom_schoolaffiliation")
     */
    public function schoolaffiliation()
    {
        return $this->render('custom_pages/schoolaffiliation.html.twig');
    }

	/**
	 * @Route("/courses", name="custom_courses")
	 */
	public function courses()
	{
		return $this->render('custom_pages/courses.html.twig');
	}


	/**
	 * @Route("/studyabroad", name="custom_studyabroad")
	 */
	public function studyabroad()
	{
		return $this->render('custom_pages/studyabroad.html.twig');
	}
}
