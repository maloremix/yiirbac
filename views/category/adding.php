<?php
/** @var app\models\CategoryForm $model */

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$form = ActiveForm::begin() ?>
<?= $form->field($model, 'title')->textInput() ?>

<?= $form->field($model, 'description')->textInput() ?>

    <div class="form-group">
        <div class="col-lg-12">
            <?= Html::submitButton('Добавить категорию', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>