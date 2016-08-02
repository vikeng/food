<?php

namespace app\modules\food\models;

use Yii;

/**
 * This is the model class for table "{{%food}}".
 *
 * @property integer $id
 * @property string $name
 *
 * @property FoodIngredient[] $foodIngredients
 * @property Ingredients[] $ingredients
 */
class Food extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%food}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'   => 'ID',
            'name' => 'Название',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFoodIngredients()
    {
        return $this->hasMany(FoodIngredient::className(), ['food_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredients()
    {
        return $this->hasMany(Ingredients::className(), ['id' => 'ingredient_id'])->viaTable('{{%food_ingredient}}',
            ['food_id' => 'id']);
    }

    public function getListIngradients(){
        $ingredients=[];
        foreach($this->ingredients as $ingredient){
            $ingredients[]=$ingredient->name;

        }
        return implode(', ',$ingredients);

    }

    /*
     * Получение списка блюд
     */

    public static function getListFoods()
    {
        $foods = [];
        foreach (Food::find()->all() as $food) {
            $foods[$food->id]=$food->name;
        }
        return $foods;
    }


    /*
     * Получение скрытый или нет
     */
    public function getHidden()
    {

        return false;
    }

}
