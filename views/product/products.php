<?php
/** @var $dataProvider */
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="body-content">

    <div class="row">
        <div class="col-lg-12">
            <?php
            echo Yii::$app->user->can('admin') ? Html::a("Добавить продукт", [Url::to('/product/adding')]) : "";
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'title',
                    'date',
                    [
                        'class' => 'yii\grid\DataColumn',
                        'label' => 'Category',
                        'value' => function ($data) {
                            return $data->category->title;
                        },
                    ],
                    [
                        'class' => 'yii\grid\DataColumn',
                        'label' => 'Редактирование',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return Html::a('Редактирвать', [Url::to('/product/edit'), 'id' => $data->id]);
                        },
                    ],
                ],
            ]);
            ?>
        </div>
    </div>
</div>