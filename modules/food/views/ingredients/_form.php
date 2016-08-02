<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\food\models\Ingredients;

/* @var $this yii\web\View */
/* @var $model app\modules\food\models\Ingredients */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ingredients-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hidden')->dropDownList([
        Ingredients::VISIBLE => Ingredients::$hidden_status[Ingredients::VISIBLE],
        Ingredients::HIDDEN  => Ingredients::$hidden_status[Ingredients::HIDDEN]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
