<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1>
        Лапин Александр Владимирович
    </h1>
    <p>
        Абзац 1
    </p>
    <p> Абзац 2</p>
    <?= Html::img('@web/images/Инвентаризация.gif',['alt' =>'Изображение'])?>
    <table border="1"  >
    <tr>
        <td>Навык</td>
        <td>Дата</td>
        <td>Описание</td>
    </tr>
     <tr>
         <td>
             Web
         </td>
         <td>
             04.09.2020
         </td>
         <td>
             yii2
         </td>
     </tr>
</table>

</div>
<style>
    img{
        max-width: 200px;
        display: block;
        margin-right: auto;
        margin-top: auto;
        padding: 14px 10px;
        border-radius: 24px;
    }
   p, h1{
        border: 0;
        background: none;
        display: block;
        margin-left: auto;
        text-align: center;
        border: 2px solid aqua;
        padding: 14px 10px;
        width: 300px;
        outline: none;
        border-radius: 24px;
        font-size: 15px;
    }
    table {
        margin-right: auto;
        margin-left: auto;
        width: 100%;
        text-align: center;
        font-family: sans-serif;
        font-size: 15px;
    }
</style>