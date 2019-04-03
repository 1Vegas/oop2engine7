
<?php
if(!$products==null) { ?>
<!-- <h3>Создать заказ:</h3> -->
<h5>Содержание заказа:</h5> 
<? } else echo "Ваша корзина пуста!" ?>
<table class="table">
<thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Название</th>
      <th scope="col">Детали</th>
      <th scope="col">Количество</th>
      <th scope="col">Цена</th>
    </tr>
  </thead>
<?php
$names = [];
foreach ($products as $product) {    
     array_push($names, $product['name']);
    ?> 
  <tbody>
    <tr>
      <th scope="row"></th>
      <td><?=$product['name']?></td>
      <td><?=$product['description']?></td>
      <td> в количестве 1 шт.</td>
      <td><?=$product['price']?>&nbsp;руб.</td>

      <td><button id="<?=$product['id_basket']?>" 
      class="delete">Удалить</button></td>
  </tbody
</table>
<!-- <table>
    <tr><?=$product['name']?></tr>
    <tr> <?=$product['description']?></tr>
    <tr> в количестве 1 шт.</tr>
    <tr> на сумму <?=$product['price']?> руб.</tr>
</table->  -->


<!-- <button id="<?=$product['id_basket']?>" class="delete">Удалить</button> -->
        <?}?>               

<?php
$names2 = implode(",", $names);
$names3 = array_count_values ($names);
$stringKeys = implode(",", array_keys($names3));
$stringValues = implode(",", $names3);
$stringKv = $stringKeys . ', в количестве: ' . $stringValues;
//var_dump($stringKv);

if(!$products==null) { ?>
<br>
<br>
<form class="nav-item nav-link" action="/ordermessage/" method="post">     
    <input hidden type="text" name="sess" value="<?=$stringKv;?>">
    <input type="text" name="username" required placeholder="Ваше имя">
    <input type="text" name="phone" required placeholder="Ваш телефон">
    <input type="email" name="email" required placeholder="Ваш email">
    <input type="submit" name="order" value="Заказать">     
</form>
<br>
<p>После отправки заказа, будет очищена</p>
<?}?>