<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;


$this->title = 'My Yii Application';
?>
<div class="site-index">
    <h1>Модуль "Блюда и ингредиенты"</h1>
    <ul>
        <li><?= Html::a('Модуль "Блюда и ингредиенты"', Url::to(['/food']), ['target' => 'blank']); ?></li>
        <li><?= Html::a('Блюда', Url::to(['/food/food']), ['target' => 'blank']); ?></li>
        <li><?= Html::a('Ингредиенты', Url::to(['/food/ingredients']), ['target' => 'blank']); ?></li>
        <li><?= Html::a('Состав блюд', Url::to(['/food/foodingredient'])); ?></li>
    </ul>
</div>
