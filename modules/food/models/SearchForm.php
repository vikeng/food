<?php
namespace app\modules\food\models;

use Yii;
use yii\base\Model;

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
        return '123';
    }


}
