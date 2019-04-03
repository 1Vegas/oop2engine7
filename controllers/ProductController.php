<?php

namespace app\controllers;


use app\model\Basket;
use app\model\Products;
use app\engine\Request;
use app\model\Orders;

class ProductController extends Controller
{

    public function actionApicatalog()
    {

        $catalog = Products::getAll();

        header('Content-Type: application/json');
        echo json_encode(['goods' => $catalog], JSON_NUMERIC_CHECK | JSON_UNESCAPED_UNICODE);
    }



    public function actionIndex()
    {       

        $catalog = Products::getAll();

        echo $this->render("catalog", ['catalog' => $catalog]);
    }

    public function actionAddBasket()
    {

           (new Basket(null, session_id(),(new Request())->getParams()['id']))->save();
           echo json_encode(['response' => 1]);



    }
    public function actionCard()
    {
        $id = (new Request())->getParams()['id'];
        $product = Products::getOne($id);

        echo $this->render("card", ['product' => $product]);
    }


}