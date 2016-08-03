<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="food-default-index">
    <h1>Блюда и ингредиенты</h1>
    <ul>
        <li><?= Html::a('Блюда', Url::to(['/food/food'])); ?></li>
        <li><?= Html::a('Ингредиенты', Url::to(['/food/ingredients'])); ?></li>
        <li><?= Html::a('Состав блюд', Url::to(['/food/foodingredient'])); ?></li>
    </ul>


    <p>

    </p>
</div>
