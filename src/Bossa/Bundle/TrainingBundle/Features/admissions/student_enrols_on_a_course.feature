Feature: Student enrols on a course
  As a student
  In order to guarantee my place for a course
  I want a way to formalise that

  Scenario: No courses scheduled
    Given there are no courses scheduled
    When I go to the "courses" page
    And I should not see any courses

  Scenario: Courses scheduled
    Given a "Symfony2 for Drupalists" is scheduled
    When I go to the "courses" page
    Then I should see the "PHP for Dummies" course
    And I should be able to enrol

  Scenario: Successful enrolment
    Given I am not enrolled in any course
    When I enrol for "Symfony2 for Drupalists"
    Then I should be marked as enrolled on this course

  Scenario: Double enrolment
    Given I am already enrolled for "Symfony2 for Drupalists"
    When I enrol for "Symfony2 for Drupalists" again
    Then I should still be marked as enrolled
    But I should be told that I can not enrol twice

  Scenario: Reaching student quota
    Given I am not enroled for "Symfony2 for Drupalists"
    And I am already enrolled in 5 other courses
    When I attempt to enrol for "Symfony2 for Drupalists"
    Then I should not be marked as enrolled
    And I should be told that my quota has been reached
