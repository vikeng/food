<?php
namespace app\modules\food\models;

use Yii;
use yii\base\Model;

class SearchForm extends Model
{
    public $ingradiens=[];


    public function rules()
    {
        return [
            [['i1', 'i2'], 'required'],
            [['i1', 'i2', 'i3', 'i4', 'i5'], 'integer'],
        ];
    }
}
