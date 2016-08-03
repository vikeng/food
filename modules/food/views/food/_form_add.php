<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\modules\food\models\Food;
use app\modules\food\models\Ingredients;
use app\modules\food\models\FoodIngredient;


/* @var $this yii\web\View */
/* @var $model app\modules\food\models\Food */
/* @var $model app\modules\food\models\Ingredients */
/* @var $form yii\widgets\ActiveForm */
?>
<?php

$foodIngredient = new FoodIngredient();
$foodIngredient->food_id=$model->id;

?>

<div class="food-add-ingredient-form">

    <?php $form = ActiveForm::begin(['action'=>'/food/foodingredient/add']); ?>

    <?= $form->field($foodIngredient, 'food_id')->hiddenInput() ?>

    <?= $form->field($foodIngredient, 'ingredient_id')->dropDownList(Ingredients::getListIngredients())->label('Добавить ингредиент') ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить' , ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
