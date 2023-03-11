<?php

namespace app\controllers;

use app\models\Product;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class ProductController extends Controller
{
    /**
     * Displays page with products.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Product::find()->joinWith('category'),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('products', compact('dataProvider'));
    }
}