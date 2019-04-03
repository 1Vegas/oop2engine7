<?php

namespace app\model;
//use app\model\DbModel;

class Products extends DbModel
{
    public $id;
    public $name;
    public $description;
    public $price;

    /**
     * Products constructor.
     * @param $id
     * @param $name
     * @param $description
     * @param $price
     */
    public function __construct($id = null, $name = null, $description = null, $price = null)
    {
        //parent::__construct();
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }


    public static function getTableName()
    {
       return "products";
    }

}