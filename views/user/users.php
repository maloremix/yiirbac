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
                        'username',
                        [
                            'class' => 'yii\grid\DataColumn',
                            'label' => 'role',
                            'value' => function ($data) {
                                return $data->getRole()->name;
                            },
                        ],
                    ],
                ]);
                ?>
            </div>
        </div>
    </div>
<?php