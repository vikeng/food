<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\food\models\FoodIngredient;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Food Ingredients';
$this->params['breadcrumbs'][] = ['label' => 'Модуль', 'url' => ['/food']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="food-ingredient-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Food Ingredient', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Блюдо',
                'value' => function (FoodIngredient $data) {
                    return $data->food->name;
                }
            ],
            [
                'label' => 'Ингредиент',
                'value' => function (FoodIngredient $data) {
                    return $data->ingredient->name;
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
