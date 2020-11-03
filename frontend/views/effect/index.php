<?php
/* форма регистрации */
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
if (!empty(Yii::$app->user->identity->username))
{

}
else
{
    $this->goHome();
}
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Заполните поля, чтобы продолжить:</p>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Имя пользователя/Логин') ?>
            <?= $form->field($model, 'email')->label('Email') ?>
            <?= $form->field($model, 'password')->passwordInput()->Label('Пароль') ?>
            <div class="form-group">
                <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>