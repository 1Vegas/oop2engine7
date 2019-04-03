<?php

namespace app\controllers;


use app\engine\Request;
use app\model\Basket;

class BasketController extends Controller
{
    public function actionIndex() {
        
        echo $this->render('basket', [
            'products' => Basket::getBasket(session_id())
        ]);
    }

    public function actionDelete() {
        $id = (new Request())->getParams()['id'];
        $basket = Basket::getOne($id);
        if (session_id() == $basket->session_id) {
            $basket->delete();
            header('Content-Type: application/json');
            echo json_encode(['response' => 1]);
        }
    }

    public function actionSend()    {
        
        if (isset($_POST['submit'])) {            
                
        }
    }


}