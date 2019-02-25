<?php include __DIR__ . "/../header.php"; ?>
<h1>Рассчет стоимости</h1>

<h4>Примерный рассчет стоимости на ваш заказ:</h4>
<ul class="list-group">
    <li class="list-group-item">Тип ламп: <?= $_POST['lamp'] ?></li>
    <li class="list-group-item">Количество ламп: <?= $_POST['countLamp'] ?></li>
    <li class="list-group-item">Материал потолка: <?= $_POST['material'] ?></li>
    <li class="list-group-item">Количество уровней: <?= $_POST['levels'] ?></li>
    <hr>
    <h4>Общая стоимость: <?= $resultPriceLamps + $resultPriceMaterial ?> BYN </h4>
</ul>

<?php include __DIR__ . "/../footer.php"; ?>
