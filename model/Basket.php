<?php

namespace app\model;

use app\engine\Db;

class Basket extends DbModel
{
    public $id;
    public $session_id;
    public $product_id;

    public function __construct($id = null, $session_id = null, $product_id = null)
    {
        $this->id = $id;
        $this->session_id = $session_id;
        $this->product_id = $product_id;
    }  

    public static function getBasket($session) {  
           
        $sql = "SELECT p.id id_prod, b.id id_basket, p.name, p.description, p.price 
        FROM basket b,products p WHERE b.product_id=p.id AND session_id = :session";                
        $my = Db::getInstance()->queryAll($sql, ['session'=>$session]);  
        //var_dump($my);

        //$res = array();        

        // foreach($my as $value) {
        //     if(!isset($_SESSION[$value['id_prod']]))
        //     {
        //         $_SESSION[$value['id_prod']] = array(
        //             'id_prod' => $value['id_prod'], 
        //             'summ' => 0, 
        //             'count' => 0,
        //             'name' => $value['name'],
        //             'description' => $value['description'],
        //         );
        //     }
        //     $_SESSION[$value['id_prod']]['summ'] += $value['price'];
        //     $_SESSION[$value['id_prod']]['count'] += 1;    
        //}         
        //     var_dump($res);     
            return $my;
    }

    public static function getSummBasket($session) {       
        $sql = "SELECT p.id id_prod, b.id id_basket, p.name, p.description, p.price 
        FROM basket b,products p WHERE b.product_id=p.id AND session_id = :session";                
       $my = Db::getInstance()->queryAll($sql, ['session'=>$session]);
       $num = 0;
       foreach($my as $cat) 
       {           
           $num += $cat[price];
       }
      return $num;
         
    }
    
    public function deleteBasket() {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName}";
        return Db::getInstance()->execute($sql, []);
    }

    public static function getTableName()
    {
        return "basket";
    }
}