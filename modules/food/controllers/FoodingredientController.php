<?php

namespace app\modules\food\controllers;

use Yii;
use app\modules\food\models\FoodIngredient;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FoodingredientController implements the CRUD actions for FoodIngredient model.
 */
class FoodingredientController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all FoodIngredient models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => FoodIngredient::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FoodIngredient model.
     * @param integer $food_id
     * @param integer $ingredient_id
     * @return mixed
     */
    public function actionView($food_id, $ingredient_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($food_id, $ingredient_id),
        ]);
    }

    /**
     * Creates a new FoodIngredient model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FoodIngredient();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'food_id' => $model->food_id, 'ingredient_id' => $model->ingredient_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Добавление ингредиента к блюду
     * Если добавлено - переход на страницу просмотра блюда, если нет - к списку блюд
     * @return mixed
     */
    public function actionAdd()
    {
        $model = new FoodIngredient();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/food/food/view', 'id' => $model->food_id]);
        }
        return $this->redirect(['/food/food']);
    }


    /**
     * Updates an existing FoodIngredient model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $food_id
     * @param integer $ingredient_id
     * @return mixed
     */
    public function actionUpdate($food_id, $ingredient_id)
    {
        $model = $this->findModel($food_id, $ingredient_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'food_id' => $model->food_id, 'ingredient_id' => $model->ingredient_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing FoodIngredient model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $food_id
     * @param integer $ingredient_id
     * @return mixed
     */
    public function actionDelete($food_id, $ingredient_id)
    {
        $this->findModel($food_id, $ingredient_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FoodIngredient model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $food_id
     * @param integer $ingredient_id
     * @return FoodIngredient the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($food_id, $ingredient_id)
    {
        if (($model = FoodIngredient::findOne(['food_id' => $food_id, 'ingredient_id' => $ingredient_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
