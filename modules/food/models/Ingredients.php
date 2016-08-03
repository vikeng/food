<?php

namespace app\modules\food\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%ingredients}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $hidden
 *
 * @property FoodIngredient[] $foodIngredients
 * @property Food[] $foods
 */
class Ingredients extends \yii\db\ActiveRecord
{
    const HIDDEN = 0;
    const VISIBLE = 1;

    public static $hidden_status = [
        self::HIDDEN  => 'Скрытый',
        self::VISIBLE => 'Виден'
    ];


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ingredients}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['hidden'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'     => 'ID',
            'name'   => 'Название',
            'hidden' => 'Hidden',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFoodIngredients()
    {
        return $this->hasMany(FoodIngredient::className(), ['ingredient_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFoods()
    {
        return $this->hasMany(Food::className(), ['id' => 'food_id'])->viaTable('{{%food_ingredient}}',
            ['ingredient_id' => 'id']);
    }

    /*
    * Получение списка блюд
    */

    public static function getListIngredients()
    {
//        $ingredients = [];
//        foreach (Ingredients::find()->all() as $ingredient) {
//            $ingredients[$ingredient->id] = $ingredient->name;
//        }
//        return $ingredients;
        return ArrayHelper::map(Ingredients::find()->all(),'id','name');
    }

}
