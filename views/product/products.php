<?php
/** @var $dataProvider */
use yii\grid\GridView;
?>

<div class="body-content">

    <div class="row">
        <div class="col-lg-12">
            <?php
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
                ],
            ]);
            ?>
        </div>
    </div>
</div>