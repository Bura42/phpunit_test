<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function setUp()
    {
     var_dump('1');
    }

    public function testThatWeCanGetTheFirstName()
    {

        $user = new \App\Models\User;

        $user->setFirstName('Billy');

        $this->assertEquals($user->getFirstName(), 'Billy');
    }

    public function testThatWeCanGetTheLastName()
    {

        $user = new \App\Models\User;

        $user->setLastName('Owl');

        $this->assertEquals($user->getLastName(), 'Owl');
    }


    public function testFullNameIsReturned()
    {
        $user = new \App\Models\User;

        $user->setFirstName('Billy');
        $user->setLastName('Owl');

        $this->assertEquals($user->getFullName(), 'Billy Owl');
    }

    public function testFirstAndLastNameAreTrimmed()
    {
        $user = new \App\Models\User;

        $user->setFirstName('Billy');
        $user->setLastName('       Owl');

        $this->assertEquals($user->getFirstName(), 'Billy');
        $this->assertEquals($user->getLastName(), 'Owl');
    }


    public function testEmailAddressCanBeSet()
    {

        $user = new \App\Models\User;

        $user->setEmail('Billy@codecourse.com');

        $this->assertEquals($user->getEmail(), 'Billy@codecourse.com');
    }

    public function testEmailVariablesContainCorrectValues()
    {
        $user = new \App\Models\User;

        $user->setFirstName('Billy');
        $user->setLastName('Owl');
        $user->setEmail('Billy@codecourse.com');

        $emailVariables = $user->getEmailVariables();

        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($emailVariables['full_name'], 'Billy Owl');
        $this->assertEquals($emailVariables['email'], 'Billy@codecourse.com');

    }
}


