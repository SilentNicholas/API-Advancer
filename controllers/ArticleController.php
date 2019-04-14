<?php
namespace app\controllers;

use yii\filters\auth\HttpBearerAuth;
use yii\rest\Controller;
use yii\data\ActiveDataProvider;
use app\models\Article;

class PostController extends Controller
{
    /**
     * @return ActiveDataProvider
     */
    public function actionIndex()
    {
        return new ActiveDataProvider([
            'query' => Article::find(),
        ]);
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::className(), //включаем аутентификацию по токену
            'except' => ['options','login'],
        ];

        return $behaviors;
    }
}