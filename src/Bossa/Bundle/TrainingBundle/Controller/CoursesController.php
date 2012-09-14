<?php

namespace Bossa\Bundle\TrainingBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CoursesController extends Controller
{
    public function listAction()
    {
        $courses = $this->getDoctrine()
            ->getManager()
            ->getRepository('Bossa:Course')
            ->findAll();

        return $this->render(
            'BossaTrainingBundle:Courses:list.html.twig',
            array('courses' => $courses)
        );
    }
}
