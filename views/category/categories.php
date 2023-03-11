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
                ]);
                ?>
            </div>
        </div>
    </div>
<?php
