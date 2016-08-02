<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\food\models\FoodIngredient */

$this->title = 'Create Food Ingredient';
$this->params['breadcrumbs'][] = ['label' => 'Модуль', 'url' => ['/food']];
$this->params['breadcrumbs'][] = ['label' => 'Food Ingredients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="food-ingredient-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
