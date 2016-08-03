<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\food\models\Ingredients;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\food\models\SearchForm */
/* @var $form ActiveForm */


$listIngredients = Ingredients::getListIngredients();
array_unshift($listIngredients, 'Не выбран');

?>
<div class="default-_search_form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($searchModel, 'ingradiens_1')->dropDownList($listIngredients) ?>
    <?= $form->field($searchModel, 'ingradiens_2')->dropDownList($listIngredients) ?>
    <?= $form->field($searchModel, 'ingradiens_3')->dropDownList($listIngredients) ?>
    <?= $form->field($searchModel, 'ingradiens_4')->dropDownList($listIngredients) ?>
    <?= $form->field($searchModel, 'ingradiens_5')->dropDownList($listIngredients) ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- default-_search_form -->
