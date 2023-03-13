<?php

namespace app\models;

use yii\base\Model;

class ProductForm extends Model
{
    public $category;
    public $title;


    public function rules()
    {
        return [
            [['category', 'title'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'category' => 'Категории',
            'title' => 'Название'
        ];
    }
}