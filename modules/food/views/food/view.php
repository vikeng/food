<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\food\models\Ingredients;

/* @var $this yii\web\View */
/* @var $model app\modules\food\models\Food */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Модуль', 'url' => ['/food']];
$this->params['breadcrumbs'][] = ['label' => 'Foods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="food-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data'  => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method'  => 'post',
            ],
        ]) ?>
    </p>
    <?php
    ?>
    <?= DetailView::widget([
        'model'      => $model,
        'attributes' => [
            'id',
            'name',
            [
                'label' => 'Скрытый',
                'value' => Ingredients::$hidden_status[$model->hidden],
            ],
            [
                'label' => 'Состав',
                'value' => $model->listIngradients,
            ]
        ],
    ]) ?>
    <?php

    var_dump($model->hidden);
    ?>
    <?= $this->render('_form_add', ['model' => $model]); ?>

</div>
