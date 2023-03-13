<?php

namespace app\commands;

use app\models\Category;
use app\models\Product;
use Faker\Factory;
use yii\console\Controller;

class SeedController extends Controller
{
    public function actionIndex(){
        $faker = Factory::create();
        for ( $i = 1; $i <= 5; $i++ ){
            $category = new Category();
            $category->title = $faker->text(30);
            $category->description = $faker->text(30);
            if ($category->save()){
                for ( $k = 1; $k <= 10; $k++ ){
                    $product = new Product();
                    $product->category_id = $category->id;
                    $product->title = $faker->text(15);
                    $product->save();
                }
            }
        }
    }
}