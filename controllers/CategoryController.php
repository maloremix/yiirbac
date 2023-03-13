<?php

namespace app\controllers;

use app\models\Category;
use app\models\CategoryForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;

class CategoryController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['adding', 'edit'],
                'rules' => [
                    [
                        'actions' => ['adding'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    [
                        'actions' => ['edit'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }

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

    public function actionAdding(){
        $model = new CategoryForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $category = new Category();
            $category->title = $model->title;
            $category->description = $model->description;

            if ($category->save()) {
                return $this->redirect(['/category']);
            }
        }
        return $this->render('adding', compact('model'));
    }

    public function actionEdit($id){
        $model = new CategoryForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $category = Category::find()->where(['id' => $id])->one();
            $category->title = $model->title;
            $category->description = $model->description;
            if ($category->save()) {
                return $this->redirect(['/category']);
            }
        }
        return $this->render('edit', compact('model'));
    }

}