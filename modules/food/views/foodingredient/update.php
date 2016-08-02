<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\food\models\FoodIngredient */

$this->title = 'Update Food Ingredient: ' . $model->food_id;
$this->params['breadcrumbs'][] = ['label' => 'Модуль', 'url' => ['/food']];
$this->params['breadcrumbs'][] = ['label' => 'Food Ingredients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->food_id, 'url' => ['view', 'food_id' => $model->food_id, 'ingredient_id' => $model->ingredient_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="food-ingredient-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
