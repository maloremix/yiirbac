<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\filters\AccessControl;

class Product extends ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'date',
                'updatedAtAttribute' => false,
                'value' => new Expression('NOW()'),
            ],
        ];

    }

    public function getCategory(){
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }
}