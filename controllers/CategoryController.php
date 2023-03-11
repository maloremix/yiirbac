<?php

namespace app\controllers;

use app\models\Category;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class CategoryController extends Controller
{
    /**
     * Displays page with categories.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Category::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('categories', compact('dataProvider'));
    }

}