<?php
/** @var app\models\CategoryForm $model */
/** @var app\models\Category $categories */

use app\models\Category;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$form = ActiveForm::begin() ?>
<?= $form->field($model, 'title')->textInput() ?>

<?= $form->field($model, 'category')->dropDownList(ArrayHelper::map($categories, 'id', 'title')) ?>

    <div class="form-group">
        <div class="col-lg-12">
            <?= Html::submitButton('Редактировать', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>