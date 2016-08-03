<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\food\models\Food;
use app\modules\food\models\Ingredients;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Foods';
$this->params['breadcrumbs'][] = ['label' => 'Модуль', 'url' => ['/food']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="food-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Food', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'label' => 'Состав',
                'value' => function (Food $data) {
                    return $data->getListIngradients();
                }
            ],
            [
                'label' => 'Скрытый?',
                'value' => function (Food $data) {
                    return $data->hidden==0? 'Скрыт':'Виден';
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
