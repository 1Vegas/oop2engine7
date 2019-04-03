<?php

namespace app\tests;


use app\engine\Render;
use PHPUnit\Framework\TestCase;

class RenderTest extends TestCase
{

    public function testRender() {
        $template = TEMPLATE_DIR . 'card' . '.php';
        $params = ['name'=>'Пицца Мясная', 'description'=>'с мясом', 'price'=>280];            
        $my = new Render();
        //$my->renderTemplate($template, $params);
              
        $this->assertEquals($params, $my->renderTemplate($template, $params));
    }
}
