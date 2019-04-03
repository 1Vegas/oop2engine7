<?php


namespace app\controllers;
use app\model\Users;

class OrdermessageController extends Controller
{

    public function actionIndex()
    {
        echo $this->renderTemplate('ordermessage');
       
    }

    
}