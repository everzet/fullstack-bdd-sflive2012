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
}
