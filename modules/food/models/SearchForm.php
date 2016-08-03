<?php
namespace app\modules\food\models;

use Yii;
use yii\base\Model;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;

class SearchForm extends Model
{
    public $ingradiens_1;
    public $ingradiens_2;
    public $ingradiens_3;
    public $ingradiens_4;
    public $ingradiens_5;

    private $_ingredients = [];


    public function attributeLabels()
    {
        return [
            'ingradiens_1' => 'Ингредиент 1',
            'ingradiens_2' => 'Ингредиент 2',
            'ingradiens_3' => 'Ингредиент 3',
            'ingradiens_4' => 'Ингредиент 4',
            'ingradiens_5' => 'Ингредиент 5',
        ];
    }

    public function rules()
    {
        return [
            [['ingradiens_1', 'ingradiens_2', 'ingradiens_3', 'ingradiens_4', 'ingradiens_5'], 'integer'],
        ];
    }

    /*
     * Валидация данных
     */
    public function validate($attributeNames = null, $clearErrors = true)
    {
        if (!parent::validate($attributeNames, $clearErrors)) {
            return false;
        }

        $this->_ingredients = [];
        if ($this->ingradiens_1 != 0) {
            $this->_ingredients[] = $this->ingradiens_1;
        }
        if ($this->ingradiens_2 != 0) {
            $this->_ingredients[] = $this->ingradiens_2;
        }
        if ($this->ingradiens_3 != 0) {
            $this->_ingredients[] = $this->ingradiens_3;
        }
        if ($this->ingradiens_4 != 0) {
            $this->_ingredients[] = $this->ingradiens_4;
        }
        if ($this->ingradiens_5 != 0) {
            $this->_ingredients[] = $this->ingradiens_5;
        }

        if (count($this->_ingredients) < 2) {
            if ($this->ingradiens_1 == 0) {
                $this->addError('ingradiens_1', 'Должно быть выбрано по крайней мере два ингредиента');
            } else {
                $this->addError('ingradiens_2', 'Должно быть выбрано по крайней мере два ингредиента');
            }
        }

        return !$this->hasErrors();
    }

    /*
     * Поиск данных
     */
    public function search()
    {
        $msg = '';
        // Блюда в которых есть хотя бы один продукт
        $foods = Food::find()->joinWith('ingredients')->where(['food.ingredients.id' => $this->_ingredients])->all();

//        $food_ing=[];
        $search_food = [];
        foreach ($foods as $food) {
            if($food->hidden==1){
                $food_ing = array_keys(ArrayHelper::map($food->ingredients, 'id', 'name'));
                $per = array_intersect($food_ing, $this->_ingredients);
                $search_food[$food->id] = count(array_intersect($food_ing, $this->_ingredients));
            }
        }
        arsort($search_food);
        list($food_id, $max_count) = each($search_food);
        reset($search_food);
        $search_id = [];
        if ($max_count == count($this->_ingredients)) {
            foreach ($search_food as $food_id => $count) {
                if ($count == $max_count) {
                    $search_id[] = $food_id;
                }
            }
        } else {
            foreach ($search_food as $food_id => $count) {
                if ($count > 1) {
                    $search_id[] = $food_id;
                }
            }
        }

        $res_foods = [];
        if (count($search_id) > 0) {
            foreach ($search_id as $id) {
                foreach ($foods as $food) {
                    if ($food->id == $id) {
                        $res_foods[] = $food;
                    }
                }
            }
        } else {
            $msg = 'Ничего не найдено';
        }

        return [
            new ArrayDataProvider(['allModels' => $res_foods]),
            $msg
        ];

    }


}
