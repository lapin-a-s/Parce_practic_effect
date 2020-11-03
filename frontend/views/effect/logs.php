<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
use  yii\db\Query;
use frontend\assets\AppAsset;
use frontend\controllers\EffectController;
$this->registerJsFile('@web/js/mainwindow.js');
$this->registerCssFile('@web/css/mainwindow.css');
$this->title = 'Основное окно';
Yii::$app->controller->layout = 'none_layout';
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<body>
<?php $this->beginBody() ?>
<?php $name = $_GET['name']; // название поставщика
// подключение к бд
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'effect24_pars';
$link = mysqli_connect($host,$user,$password,$db_name);
$query_count = mysqli_query($link,"SELECT * from providers where `name` = '{$name}' ");
$row_query = mysqli_fetch_array($query_count)?>

<input type="checkbox" id="side-checkbox" />
<div class="side-panel">
    <label class="side-button-2" for="side-checkbox">+</label>
    <div class="side-title"> &#128104; <?= Yii::$app->user->identity->username ?></div>
    <div class="side-title"> &#9993; <?= $name ?></div>
    <p style="color: yellow">&#10047; <input type="submit" style="margin: 2px " value="Статистика" class="parser_acti" onclick="showstat();" id="parser_acti"></p>
   </div>
<div class="side-button-1-wr">
    <label class="side-button-1" for="side-checkbox">
        <div class="side-b side-open">&#9776;</div>
    </label>
</div>
<div class="card-deck" id="stat_information">
<section class="statistic">
    <div class="card text-white bg-primary  mb-3" style="max-width: 18rem;">
        <div class="card-header">Получено</div>
        <div class="card-body">
            <h5 class="card-title"><?=$row_query['COUNT'] ?></h5>
           </div>
    </div>
    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
        <div class="card-header">Обновлено</div>
        <div class="card-body">
            <h5 class="card-title"><?= $row_query['STORE_COUNT'] ?></h5>
        </div>
    </div>
    <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
        <div class="card-header">Ошибок</div>
        <div class="card-body">
            <h5 class="card-title"><?= $row_query['ERRORS'] ?></h5>
         </div>
    </div>
    <div class="card text-black mb-3" style="max-width: 18rem;">
        <div class="card-header">Предупреждений</div>
        <div class="card-body">
            <h5 class="card-title"><?= $row_query['WARNINGS'] ?></h5>
        </div>
    </div>
</section>
    <div>
    Обновление информации
    <ul class="list-group">
        <?php // парсинг
        $curl_handle=curl_init();
        curl_setopt($curl_handle, CURLOPT_URL,'https://effect-gifts.ru/api/?action=getHappyLogs');
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
        $query = curl_exec($curl_handle);
        curl_close($curl_handle);
        $query = json_decode($query);
        $countgood = 0;
        $countbad = 0;
        $countall = 0;
foreach($query as $item) { // вывод в виде группы списка
    foreach ($item as $key => $value) {
   if($value['0'] == 9 )  // если успешно
    {
       $value['0'] = '+';
            echo "<li class=\"list-group-item d-flex justify-content-between align-items-center list-group-item-success\">
            <span style='font-size: 14px'>$value</span>
        </li>";
            $countgood ++;
    }
else if ($value['1']) // изменение цвета обычного текста
{
        echo "<li class=\"list-group-item d-flex justify-content-between align-items-center \">
            <span style='font-size: 14px'>$value</span>
        </li>";

}
else // если неудачно
{
    echo "<li class=\"list-group-item d-flex justify-content-between align-items-center list-group-item-danger\">
            <span style='font-size: 14px'>$value</span>
        </li>";
    $countbad ++;
}

        $countall++;
    }
    echo "<br/>";
}
//обновление данных
mysqli_query($link,"Update providers set COUNT = $countall, STORE_COUNT = $countgood, ERRORS = $countbad, WARNINGS = $countbad where `name` = '{$name}'  "); ?>
    </ul>
    </div>
    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<?php $this->endBody() ?>
</body>
