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
                echo Yii::$app->user->can('admin') ? Html::a("Добавить категорию", [Url::to('/category/adding')]) : "";
                echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'title',
                        'description',
                        [
                            'class' => 'yii\grid\DataColumn',
                            'label' => 'Редактирование',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return Html::a('Редактирвать', [Url::to('/category/edit'), 'id' => $data->id]);
                            },
                        ],
                    ],
                ]);
                ?>
            </div>
        </div>
    </div>
<?php
