<div class="nav-item nav-link">
<H4>Каталог товаров:</H4>
</div>
<?php
foreach ($catalog as $item):?>
<div class="nav-item nav-link">
<a href="product/card/?id=<?=$item['id']?>">
    <h5><?=$item['name']?></h5>
</a>
<p><?=$item['description']?></p>
<p>Стоимость:<?=$item['price']?></p>


 <button id="<?=$item['id']?>" class="action">Купить</button>


<hr>
</div>
<?endforeach;?>