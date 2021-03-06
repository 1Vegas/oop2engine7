<?php
session_start();
//include "../engine/Autoload.php";
require_once '../vendor/autoload.php';
include "../config/config.php";

use app\model\Products;
use app\engine\Autoload;
use app\engine\Render;
use app\engine\Request;


spl_autoload_register([new Autoload(), 'loadClass']);

try {
    $request = new Request();


//$product = Products::getOne(1)->info("oleg");
//var_dump($product);


    $controllerName = $request->getControllerName()?: 'product';
    $actionName = $request->getActionName();

    $controllerClass = "app\\controllers\\" . ucfirst($controllerName) . "Controller";

//var_dump($controllerClass, $actionName);

    if (class_exists($controllerClass)) {
        $controller = new $controllerClass(new Render());
        $controller->runAction($actionName);
    }

}catch (\PDOException $e) {
    echo "Ошибка PDO!";

    echo $e->getMessage();
    var_dump($e->getTrace());
}
catch (\Exception $e) {
    echo $e->getMessage();
    var_dump($e->getTrace());
    // var_dump($e);
}