<?php

namespace api\controllers;

use Yii;
use yii\rest\Controller;
use api\models\LoginForm;
use api\models\SignupForm;

class AuthController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        return 'api';
    }

    /**
     * @return LoginForm|\common\models\Token
     * @throws \yii\db\Exception
     */
    public function actionLogin()
    {
        $model = new LoginForm();
        $model->load(Yii::$app->request->bodyParams, '');
        if ($token = $model->auth()) {
            return $token;
        } else {
            return $model;
        }
    }


    /**
     * @return SignupForm|\common\models\User
     * @throws \yii\db\Exception
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        $model->load(Yii::$app->request->bodyParams, '');
        if ($user = $model->signup()) {
            return $user;
        } else {
            return $model;
        }
    }


    /**
     * @return array
     */
    protected function verbs()
    {
        return [
            'login' => ['post'],
            'signup' => ['post']
        ];
    }

}
