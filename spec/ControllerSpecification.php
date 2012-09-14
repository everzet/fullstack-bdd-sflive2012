<?php

namespace spec;

use Symfony\Component\HttpFoundation\Response;

use PHPSpec2\Specification;
use PHPSpec2\Mocker\Mockery\ExpectationProxy;
use PHPSpec2\Matcher\MatcherInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;

abstract class ControllerSpecification implements Specification
{
    /**
     * @param Prophet $container mock of Symfony\Component\DependencyInjection\ContainerInterface
     * @param Prophet $doctrine mock of Doctrine\Bundle\DoctrineBundle\Registry
     * @param Prophet $manager mock of Doctrine\Common\Persistence\ObjectManager
     * @param Prophet $templating mock of Symfony\Component\Templating\EngineInterface
     * @param Prophet $repository mock of Doctrine\ORM\EntityRepository
     */
    function described_with($container, $doctrine, $manager, $templating, $repository)
    {
        if (!$this->object->getProphetSubject() instanceof ContainerAwareInterface) {
            throw new \RuntimeException('Controller must implement ContainerAwareInterface.');
        }

        $container->get('doctrine')->willReturn($doctrine);
        $container->get('templating')->willReturn($templating);

        $doctrine->getManager()->willReturn($manager);
        $manager->getRepository()->willReturn($repository);
        $repository->findAll()->willReturn(array());

        $expectation = $templating->renderResponse()->willReturn(new Response());

        $this->object->setContainer($container);
        $this->object->getProphetMatchers()->add(new TemplateRenderMatcher($expectation));

        $this->controller = $this->object;
    }
}

class TemplateRenderMatcher implements MatcherInterface
{
    private $expectation;
    private $controller;

    public function __construct(ExpectationProxy $expectation)
    {
        $this->expectation = $expectation;
    }

    public function supports($name, $subject, array $arguments)
    {
        return 'render' === $name;
    }

    public function positiveMatch($name, $subject, array $arguments)
    {
        if (2 == count($arguments)) {
            $arguments[] = null;
        } elseif (1 == count($arguments)) {
            $arguments[] = array();
            $arguments[] = null;
        }

        $this->controller = $subject;
        $this->expectation->withArguments($arguments);
        $this->expectation->shouldBeCalled();

        return $this;
    }

    public function negativeMatch($name, $subject, array $arguments)
    {
        if (2 == count($arguments)) {
            $arguments[] = null;
        } elseif (1 == count($arguments)) {
            $arguments[] = array();
            $arguments[] = null;
        }

        $this->controller = $subject;
        $this->expectation->withArguments($arguments);
        $this->expectation->shouldNotBeCalled();

        return $this;
    }

    public function duringAction($name, array $arguments = array())
    {
        call_user_func_array(
            array($this->controller, $name.'Action'), $arguments
        );
    }

    public function getPriority()
    {
        return 0;
    }
}
