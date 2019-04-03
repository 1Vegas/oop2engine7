<?php
//сие из методички
namespace app\tests;

use app\model\MathClass;
use PHPUnit\Framework\TestCase;

class MathClassTest extends TestCase 
{
    protected $fixture;
    protected function setUp()
    {
        $this->fixture = new MathClass(); 
    }
    protected function tearDown()
    {
        $this->fixture = NULL;
    }

    /** 
    * @dataProvider providerFactorial 
    */

    public function testFactorial($a, $b)
    {
        $my = new MathClass();
        $this->assertEquals($b, $my->factorial($a)); 
    }
    public function providerFactorial()
    {
        return array (
            array (0, 1), 
            array (2, 2), 
            array (5, 120)
        ); 
    }
}