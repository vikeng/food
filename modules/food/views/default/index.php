<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use app\modules\food\models\Food;
use yii\data\ArrayDataProvider;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\food\models\SearchForm */
/* @var $listFoods \yii\data\ArrayDataProvider */
/* @var $msg string */

?>
<div class="food-default-index">
    <h1>Блюда и ингредиенты</h1>
    <ul>
        <li><?= Html::a('Блюда', Url::to(['/food/food'])); ?></li>
        <li><?= Html::a('Ингредиенты', Url::to(['/food/ingredients'])); ?></li>
        <li><?= Html::a('Состав блюд', Url::to(['/food/foodingredient'])); ?></li>
    </ul>
    <?=
    $this->render('_search_form', ['searchModel' => $searchModel]);
    ?>

    <?php
    if ($listFoods === null) {
        echo $msg;
    } else {
        echo GridView::widget([
            'dataProvider' => $listFoods,
            'columns'      => [
                'id',
                'name',
                [
                    'label' => 'Состав',
                    'value' => function (Food $data) {
                        return $data->getListIngradients();
                    }
                ]
            ]
        ]);
    }

    ?>
</div>
