<?php

namespace app\controllers;

use yii\filters\auth\HttpBearerAuth;
use yii\rest\Controller;

class ApiController extends Controller
{
    /*/**
     * @return array
     */
    /*public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::className(), //включаем аутентификацию по токену
            'except' => ['options','login'],
        ];
        return $behaviors;
    }*/

    public function actionIndex()
    {
        return "Base controller";
    }
}
