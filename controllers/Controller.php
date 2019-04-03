<?php

namespace app\controllers;

use app\engine\Db;
use app\engine\Render;
use app\interfaces\IRenderer;
use app\model\Basket;
use app\model\Products;
use app\model\Users;
use app\model\Orders;
use http\Client\Curl\User;

class Controller implements IRenderer
{
    private $action;
    private $defaulAction = "index";
    private $layout = 'main';
    private $useLayout = true;
    private $renderer;


    public function __construct(IRenderer $renderer)
    {
        $this->renderer = $renderer;
    }


    public function runAction($action = null)
    {

        $this->action = $action ?: $this->defaulAction;

        $method = "action" . ucfirst($this->action);

        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            echo "404";
        }
    }


    public function render($template, $params = [])
    {
        if ($this->useLayout) {
            return $this->renderTemplate(
                "layouts/{$this->layout}",
                [
                    'content' => $this->renderTemplate($template, $params),
                    'count' => Basket::getCountWhere('session_id', session_id()),
                    'price' => Basket::getSummBasket(session_id()),                    
                    'auth' => Users::isAuth(),
                    'username' => Users::getName(),
                    
                                      

                ]
            );


        } else {
            return $this->renderTemplate($template, $params);
        }
    }


    public function renderTemplate($template, $params = [])
    {
       return $this->renderer->renderTemplate($template, $params);
    }

}