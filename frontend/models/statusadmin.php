<?php
namespace frontend\models;
use yii\db\ActiveRecord;
use yii\base\Model;

class statusadmin extends ActiveRecord
{
    public function rules() {
        return [
            [['ready','id'], 'trim'],
            ['ready', 'required', 'message' => 'Поле «Название модели» обязательно для заполнения'],
            ['ready', 'integer', 'message' => 'Поле «Цена» необходимо заполнить символами '],
        ];
    }
    public static function tableName(){
        return "ord";
    }
    public static function findByname($name)
    {
        return static::findOne(['name' => $name]);
    }
}