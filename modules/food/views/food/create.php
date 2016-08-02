<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\food\models\Food */

$this->title = 'Create Food';
$this->params['breadcrumbs'][] = ['label' => 'Модуль', 'url' => ['/food']];
$this->params['breadcrumbs'][] = ['label' => 'Список блюд', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="food-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
