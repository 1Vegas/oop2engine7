<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"     
    crossorigin="anonymous">

    <title>Document</title>
</head>
<body>

<ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link active" href="/">Главная</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/basket/">Корзина</a>
  </li>
  <li class="nav-item nav-link"> Кол-во: <?=$count?> Сумма: <?=$price?> руб.
  </li>  
  
</ul>



<?php
if ($_SESSION['login'] == 'admin'){ ?>
    
<ul class="nav justify-content-center">
</li>
  <li class="nav-item nav-link"> Добро пожаловать, <?=ucfirst($username)?>!
  </li> 
  <li class="nav-item">
    <a class="nav-link active" href="/orders/">Панель Админа</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/user/logout/">[Выход]</a>
</ul>
<?php }
else if($_SESSION['login'] == 'user'){?>
<ul class="nav justify-content-center">
</li>
  <li class="nav-item nav-link"> Добро пожаловать, <?=ucfirst($username)?>!
  </li> 
  <li class="nav-item">
    <a class="nav-link" href="/user/logout/">[Выход]</a>
</ul>
<?php }
else {?>
<form class="nav-item nav-link" action="/user/login/" method="post">
    <input type="text" name="login" placeholder="Логин" required>
    <input type="text" name="pass" placeholder="Пароль" required>
    <input type="submit" name="submit" value="Войти">
</form>
<?php }?>



<br>
<?=$content?>

<script>
    $(document).ready(function(){
        $(".action").on('click', function(e){
            let id = e.target.id;
            $.ajax({
                url: "/product/AddBasket/",
                type: "POST",
                dataType : "json",
                data:{
                    id: id
                },
                error: function() {alert('error');},
                success: function(answer){
                    {window.location.reload()}
                }

            })
        });

    });

    $(document).ready(function(){
        $(".delete").on('click', function(e){
            let id = e.target.id;
            $.ajax({
                url: "/basket/delete/",
                type: "POST",
                dataType : "json",
                data:{
                    id: id
                },
                error: function() {alert('error');},
                success: function(answer){
                    {window.location.reload()}
                }

            })
        });

    });

    $(document).ready(function(){
        $(".delorder").on('click', function(e){
            let id = e.target.id;
            $.ajax({
                url: "/orders/delete/",
                type: "POST",
                dataType : "json",
                data:{
                    id: id
                },
                error: function() {alert('error');},
                success: function(answer){
                    {window.location.reload()}
                }

            })
        });

    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" 
crossorigin="anonymous">
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" 
crossorigin="anonymous">
</script>
</body>
</html>