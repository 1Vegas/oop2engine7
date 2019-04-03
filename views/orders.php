<?php

if ($_SESSION['login'] == 'admin'): ?>  
<div class="events">
	<div id="one">
		<h5 id="two">ЗАКАЗЫ:</h5>		
	</div>	
</div>
<?php 
 include_once '../model/Orders.php';
 $orders = Orders::getAll();  ?>
 <table class="table">
  <thead>
    <tr>
      <th scope="col">№</th>
      <th scope="col">Имя пользователя</th>
      <th scope="col">Email</th>
      <th scope="col">Телефон</th>
      <th scope="col">Данные по заказу</th>
      <th scope="col">Удалить</th>
    </tr>
  </thead>
<?php
foreach ($orders as $order) {?>

  <tbody>
    <tr>
      <th scope="row"><?=$order['id']?></th>
      <td width="200px"><?=$order['username']?></td>
      <td width="200px"><?=$order['email']?></td>
      <td width="200px"><?=$order['phone']?></td>
      <td><?=$order['sess']?></td>
      <td>      
      <button type="button" id="<?=$order['id']?>  
      class="delorder">X</button>
      </td>
  </tbody
</table>

<? }  ?>
<br>
<form action="/orders/" method="post">
    <input type="submit" value="Обновить" class="btn btn-light">
</form>
<br>
<br>

<?else:?>
<p>Не, ну не такой же степени!! Введите пароль!:</p>
<form action="/user/login/" method="post">
    <input type="text" name="login" placeholder="Логин" required>
    <input type="text" name="pass" placeholder="Пароль" required>
    <input type="submit" name="submit" value="Войти">
</form>
<?endif;?>