<?php


namespace app\controllers;
use app\model\Orders;
use app\engine\Request;
use app\model\DbModel;

class OrdersController extends Controller
{

    public function actionIndex() 
    {        
        // if ($_POST['order']=='Заказать') {
        //     (new Orders(null, $_POST['username'], $_POST['email'], $_POST['phone'], $_POST['sess']))->insert();
        //     header("Location: /");             
        // }

        echo $this->render('orders', []);
    }   

    public function actionDelete() {
        $id = (new Request())->getParams()['id'];
        $orders = $this->del($id);
        if ($id == $orders->$id) {
            $orders->del($id);
        }        
    }    
    
    // public function actionDelete() {
    //     $id = (new Request())->getParams()['id'];
    //     $basket = Basket::getOne($id);
    //     if (session_id() == $basket->session_id) {
    //         $basket->delete();
    //         header('Content-Type: application/json');
    //         echo json_encode(['response' => 1]);
    //     }
    // }

    
}