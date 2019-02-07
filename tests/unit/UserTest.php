<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    protected $user;

    public function setUp()
    {
        $this->user = new \App\Models\User;
    }

    public function testThatWeCanGetTheFirstName()
    {

        $this->user->setFirstName('Billy');

        $this->assertEquals($this->user->getFirstName(), 'Billy');
    }

    public function testThatWeCanGetTheLastName()
    {



        $this->user->setLastName('Owl');

        $this->assertEquals($this->user->getLastName(), 'Owl');
    }


    public function testFullNameIsReturned()
    {

        $this->user->setFirstName('Billy');
        $this->user->setLastName('Owl');

        $this->assertEquals($this->user->getFullName(), 'Billy Owl');
    }

    public function testFirstAndLastNameAreTrimmed()
    {


        $this->user->setFirstName('Billy');
        $this->user->setLastName('       Owl');

        $this->assertEquals($this->user->getFirstName(), 'Billy');
        $this->assertEquals($this->user->getLastName(), 'Owl');
    }


    public function testEmailAddressCanBeSet()
    {

        $this->user->setEmail('Billy@codecourse.com');

        $this->assertEquals($this->user->getEmail(), 'Billy@codecourse.com');
    }

    public function testEmailVariablesContainCorrectValues()
    {

        $this->user->setFirstName('Billy');
        $this->user->setLastName('Owl');
        $this->user->setEmail('Billy@codecourse.com');

        $emailVariables = $this->user->getEmailVariables();

        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($emailVariables['full_name'], 'Billy Owl');
        $this->assertEquals($emailVariables['email'], 'Billy@codecourse.com');

    }
}


