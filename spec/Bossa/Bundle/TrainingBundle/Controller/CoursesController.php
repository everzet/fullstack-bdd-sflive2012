<?php

namespace spec\Bossa\Bundle\TrainingBundle\Controller;

use PHPSpec2\Specification;

class CoursesController extends \spec\ControllerSpecification
{
    function it_should_respond_to_list_action_call()
    {
        $response = $this->coursesController->listAction();
        $response->getStatusCode()->shouldReturn(200);
    }

    function it_should_render_list_of_courses()
    {
        $this->controller->shouldRender(
            'BossaTrainingBundle:Courses:list.html.twig',
            array('courses' => array())
        )->duringAction('list');
    }

    function it_should_pass_courses_from_domain_to_the_view($repository)
    {
        $repository->findAll()->willReturn(array('item1', 'item2'));

        $this->controller->shouldRender(
            'BossaTrainingBundle:Courses:list.html.twig',
            array('courses' => array('item1', 'item2'))
        )->duringAction('list');
    }
}
