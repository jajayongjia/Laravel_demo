<?php

namespace Tests\Unit;

use App\Student;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
        ;
    }

    public function testSetterGetter(){
      $student = new \App\Student;
      $student->setName('aa');
      $student->setPhoneNumber('bb');
      $student->setEmail('cc');

      $this->assertEquals($student->getName(),'aa');
      $this->assertEquals($student->getPhoneNumber(),'bb');
      $this->assertEquals($student->getEmail(),'cc');

    }
}
