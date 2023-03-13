<?php

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use app\models\ProductForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class ProductController extends Controller
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

    public function actionAdding(){
        $model = new ProductForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $product = new Product();
            $product->title = $model->title;
            $product->category_id = $model->category;

            if ($product->save()) {
                return $this->redirect(['/product']);
            }
        }
        $categories = Category::find()->all();
        return $this->render('adding', compact('model', 'categories'));
    }

    public function actionEdit($id){
        $model = new ProductForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $product = Product::find()->where(['id' => $id])->one();
            $product->title = $model->title;
            $product->category_id = $model->category;
            if ($product->save()) {
                return $this->redirect(['/product']);
            }
        }
        $categories = Category::find()->all();
        return $this->render('edit', compact('model', 'categories'));
    }

}