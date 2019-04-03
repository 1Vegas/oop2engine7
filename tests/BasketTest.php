<?php
//сие из методички
namespace app\tests;
use app\model\Basket;
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

class BasketTest extends TestCase
{
    
    protected $fixture;
    protected function setUp()
    {
        $this->fixture = new Basket(); 
    }
    protected function tearDown()
    {
        $this->fixture = NULL;
    }
    

    public function testBasket()
    {        
        //$a = 'basket';
        $my = new Basket();                
        $this->assertIsString($my::getTableName());

    }

    public function testBasket1()
    {        
        $a = 'basket';
        $my = new Basket();        
        $this->assertEquals($a, $my::getTableName());
        

    }

    public function testBasket2()
    {
        $b = 'ohbkg9ccupm4m90tog9n7i7rpv72d6sv';         
        $my = new Basket();                        
        //выскакивает ошибка: "PDOException: could not find driver" - это из-за статика? не фурычит!
        $this->assertIsObject($my->getBasket($b));
    }
    // public function providergetBasket()
    // {
    //     return array (
    //         array ('m1cbspt0bheg3eg0pn896k7eba6682la', 'm1cbspt0bheg3eg0pn896k7eba6682la22'), 
    //         array (2, 2), 
    //         array (5, 120)
    //     ); 
    // }
}