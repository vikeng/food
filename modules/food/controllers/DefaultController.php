<?php

namespace app\modules\food\controllers;

use Yii;
use yii\web\Controller;
use app\modules\food\models\SearchForm;

/**
 * Default controller for the `food` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SearchForm();
        $listFoods = [];
        if ($searchModel->load(Yii::$app->request->post())) {
            if ($searchModel->validate()) {
                $listFoods = $searchModel->search();
            }
        }

        return $this->render('index', ['searchModel' => $searchModel, 'listFoods' => $listFoods]);
    }
}
