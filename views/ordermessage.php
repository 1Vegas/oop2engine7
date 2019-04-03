<?php
var_dump($_POST);
include_once '../model/Orders.php';
use app\model\Basket;

if ($_POST['order']=='Заказать') {
    (new Orders(null, $_POST['username'], $_POST['email'], $_POST['phone'], $_POST['sess']))->save();
        
    Basket::deleteBasket();
    //header("Location: /"); 
    //header("Location: {$_SERVER['HTTP_REFERER']}");

}
?>
<h2>Ваш заказ для <?=$_POST['username']?> передан на обработку</h2>
<a href="/">Вернуться на главную</a>
