<?php

namespace app\tests;


use app\model\Products;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{

    public function testProduct() {
        $name = "Чай";
        $product = new Products(null, $name, "aaa", 12);
        $this->assertEquals($name, $product->name);
    }
}