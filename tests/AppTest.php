<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

class AppTest extends TestCase
{
    public function testFirstTest()
    {
        $result = 1 + 1;

        $this->assertEquals(2, $result);
    }

    public function testSecondTest(){
        $result = 2 * 5;

        $this -> assertEquals(10, $result);
    }
}