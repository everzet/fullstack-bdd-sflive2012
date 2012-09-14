<?php

namespace spec\Bossa\Entity;

use PHPSpec2\Specification;

class Course implements Specification
{
    function it_should_exist()
    {
        $this->object->shouldNotBe(null);
    }

    function it_should_have_primary_key_which_is_null()
    {
        $this->course->getId()->shouldReturn(null);
    }
}
