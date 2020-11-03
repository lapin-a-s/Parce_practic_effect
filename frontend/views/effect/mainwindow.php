<?php
/*
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model frontend\models\Effect_provider_add */
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\controllers\EffectController;
use frontend\models\Effect_provider_add;
$this->registerJsFile('@web/js/mainwindow.js');
$this->registerCssFile('@web/css/mainwindow.css');
$this->title = 'Основное окно';
Yii::$app->controller->layout = 'main_layout';
// подключение к бд
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'effect24_pars';
$link = mysqli_connect($host,$user,$password,$db_name);
$query_providers_count = mysqli_query($link,'SELECT name from providers');
while ($row = mysqli_fetch_array($query_providers_count)) { // вывод всех поставщиков из бд в виде карточек
    echo "<div class=\"col-md-2 col-sm-6\" style=\"\">
                <div class=\"card text-white bg-dark mb-3 d-inline-block\">
                    <div class=\"card-body\">
                        <h5 style=\"font-size: 30px;\">&#128388;</h5>
                        <h4 class=\"card-title\">".$row['name']."</h4>
                        <a href=\"logs?name=".$row['name']."\" class=\"btn btn-primary provider\">Логи</a>
                    </div>
                </div>
            </div>";
}
$model = new Effect_provider_add();
?>
<a href="logs.php"></a>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<body>
<?php $this->beginBody() ?>
<input type="checkbox" id="side-checkbox" />
<div class="side-panel">
    <label class="side-button-2" for="side-checkbox">+</label>
    <div class="side-title"> &#128104; <?= Yii::$app->user->identity->username ?></div>
    <p style="color: yellow">&#43;<input type="submit" style="margin: 2px " value="Добавление" onclick="modaladd();" class="parser_act" id="parser_act"></p>
</div>
<div class="side-button-1-wr">
    <label class="side-button-1" for="side-checkbox">
        <div class="side-b side-open">&#9776;</div>
    </label>
</div>
<section class="providers">
    <div class="container">
        <div class="row">
            </div>
        </div>
</section>
<div class="add" style="display: none">
    <p>Заполните поля, чтобы продолжить:</p>
    <div class="row1">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-add']); ?>
            <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label('Название поставщика') ?>
            <?= $form->field($model, 'COUNT')->label('Количество') ?>
            <?= $form->field($model, 'ERRORS')->label('Количество ошибок') ?>
            <?= $form->field($model, 'WARNINGS')->label('Количество предупреждений') ?>
            <?= $form->field($model, 'STORE_COUNT')->label('Количество покупок') ?>
            <div class="form-group">
                <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<?php $this->endBody() ?>
</body>