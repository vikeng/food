<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\modules\food\models\Food;
use app\modules\food\models\Ingredients;

/* @var $this yii\web\View */
/* @var $model app\modules\food\models\FoodIngredient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="food-ingredient-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'food_id')->dropDownList(Food::getListFoods()) ?>

    <?= $form->field($model, 'ingredient_id')->dropDownList(Ingredients::getListIngredients()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
