<?php

namespace frontend\models;
use yii\db\ActiveRecord;
use yii\base\Model;

class Effect_provider_add extends ActiveRecord
{

    public function rules() {
        return [
            [['name','COUNT','STORE_COUNT','WARNINGS','ERRORS'], 'trim'],
            ['name', 'required', 'message' => 'Поле «Название поставщика» обязательно для заполнения'],
            ['COUNT', 'required', 'message' => 'Поле «Количество» обязательно для заполнения'],
            ['name', 'unique', 'targetClass' => 'frontend\models\effect_provider_add', 'message' => 'Это имя пользователя уже используется'],
            ['STORE_COUNT', 'required', 'message' => 'Поле «Количество покупок» обязательно для заполнения'],
            ['WARNINGS', 'required', 'message' => 'Поле «Предупреждения» обязательно для заполнения'],
            ['ERRORS', 'required', 'message' => 'Поле «Ошибки» обязательно для заполнения'],
            ['COUNT', 'integer', 'message' => 'Поле «Количество» необходимо заполнить символами'],
            ['STORE_COUNT', 'integer', 'message' => 'Поле «Количество покупок» необходимо заполнить символами'],
            ['WARNINGS', 'integer', 'message' => 'Поле «Предупреждения» необходимо заполнить символами '],
            ['ERRORS', 'integer', 'message' => 'Поле «Ошибки» необходимо заполнить символами'],
        ];
    }
    public static function tableName(){
        return "providers";
    }
    public static function findByname($name)
    {
        return static::findOne(['name' => $name]);
    }
}