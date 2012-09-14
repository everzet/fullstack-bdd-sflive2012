<?php

namespace Bossa\Bundle\TrainingBundle\Features\Context;

use Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\MinkExtension\Context\MinkAwareInterface;
use Behat\Symfony2Extension\Context\KernelAwareInterface;
use Behat\Mink\Mink;

use Symfony\Component\HttpKernel\KernelInterface;

class StudentContext extends BehatContext implements MinkAwareInterface,
                                                     KernelAwareInterface
{
    private $mink;
    private $minkParameters;
    private $kernel;

    public function setMink(Mink $mink)
    {
        $this->mink = $mink;
    }

    public function setMinkParameters(array $parameters)
    {
        $this->minkParameters = $parameters;
    }

    public function setKernel(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * @Given /^there are no courses scheduled$/
     */
    public function thereAreNoCoursesScheduled()
    {
    }

    /**
     * @When /^I go to the "([^"]*)" page$/
     */
    public function iGoToThePage($page)
    {
        $url = $this->kernel->getContainer()->get('router')->generate(
            str_replace(' ', '_', $page), array(), false
        );

        $this->mink->getSession()->visit($url);
        $this->mink->assertSession()->statusCodeEquals(200);
    }

    /**
     * @Given /^I should not see any courses$/
     */
    public function iShouldNotSeeAnyCourses()
    {
        throw new PendingException();
    }

    /**
     * @Given /^a "([^"]*)" is scheduled$/
     */
    public function aIsScheduled($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then /^I should see the "([^"]*)" course$/
     */
    public function iShouldSeeTheCourse($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given /^I should be able to enrol$/
     */
    public function iShouldBeAbleToEnrol()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I am not enrolled in any course$/
     */
    public function iAmNotEnrolledInAnyCourse()
    {
        throw new PendingException();
    }

    /**
     * @When /^I enrol for "([^"]*)"$/
     */
    public function iEnrolFor($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then /^I should be marked as enrolled on this course$/
     */
    public function iShouldBeMarkedAsEnrolledOnThisCourse()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I am already enrolled for "([^"]*)"$/
     */
    public function iAmAlreadyEnrolledFor($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When /^I enrol for "([^"]*)" again$/
     */
    public function iEnrolForAgain($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then /^I should still be marked as enrolled$/
     */
    public function iShouldStillBeMarkedAsEnrolled()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I should be told that I can not enrol twice$/
     */
    public function iShouldBeToldThatICanNotEnrolTwice()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I am not enroled for "([^"]*)"$/
     */
    public function iAmNotEnroledFor($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given /^I am already enrolled in (\d+) other courses$/
     */
    public function iAmAlreadyEnrolledInOtherCourses($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When /^I attempt to enrol for "([^"]*)"$/
     */
    public function iAttemptToEnrolFor($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then /^I should not be marked as enrolled$/
     */
    public function iShouldNotBeMarkedAsEnrolled()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I should be told that my quota has been reached$/
     */
    public function iShouldBeToldThatMyQuotaHasBeenReached()
    {
        throw new PendingException();
    }

}
