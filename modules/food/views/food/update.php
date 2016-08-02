<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\food\models\Food */

$this->title = 'Update Food: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Модуль', 'url' => ['/food']];
$this->params['breadcrumbs'][] = ['label' => 'Foods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="food-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
