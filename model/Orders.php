<?php


use app\model\DbModel;

Class Orders extends DbModel 
{
    public $id;
    public $username;
    public $email;
    public $phone;
    public $sess;

    /**
     * Orders constructor.
     * @param $id
     * @param $username
     * @param $email
     * @param $phone
     * @param $sess
     */
    public function __construct($id = null, $username = null, $email = null, $phone = null, $sess = null )
    {            
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->phone = $phone;
        $this->sess = $sess;
    } 
    

    public static function getTableName()
    {
       return "orders";
    }
}