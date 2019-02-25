<?php include __DIR__ . "/../header.php"; ?>
<div class="main">
    <form action="/calc" method="post">
        <div class="form-group">
            <label for="name">Название материала:</label>
            <select name="material" class="custom-select">
                <option selected>Выберите материал</option>
                <?php foreach ($material as $name): ?>
                    <option value="<?= $name->getMaterial() ?>"><?= $name->getMaterial() ?> | <?= $name->getPrice() ?>
                        BYN
                    </option>
                <? endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="lamp">Вид ламп:</label>
            <select name="lamp" class="custom-select">
                <option selected>Выберите освещение</option>
                <?php foreach ($lamp as $item): ?>
                    <option value="<?= $item->getLamp() ?>"><?= $item->getLamp() ?> | <?= $item->getPricePerPoint() ?>
                        BYN
                    </option>
                <? endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="countLamp">Укажите количество ламп:</label>
            <input type="text" class="form-control" name="countLamp" id="countLamp"
                   value="<?= $_POST['countLamp'] ?? '' ?>"
                   size="50">
        </div>
        <div class="form-group">
            <label for="levels">Количество уровней потолка:</label>
            <input type="text" class="form-control" name="levels" id="levels" value="<?= $_POST['levels'] ?? '' ?>"
                   size="50">
        </div>
        <div class="form-group">
            <label for="lRoom">Длина комнаты в метрах:</label>
            <input type="text" class="form-control" name="lRoom" id="lRoom" value="<?= $_POST['lRoom'] ?? '' ?>"
                   size="50">
        </div>
        <div class="form-group">
            <label for="wRoom">Длина комнаты в метрах:</label>
            <input type="text" class="form-control" name="wRoom" id="wRoom" value="<?= $_POST['wRoom'] ?? '' ?>"
                   size="50">
        </div>
        <input type="submit" class="btn btn-info" value="Рассчитать">
    </form>
</div>
<?php include __DIR__ . "/../footer.php"; ?>
