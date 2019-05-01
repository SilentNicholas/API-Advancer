<?php

namespace api\controllers;

use Yii;
use yii\rest\Controller;
use api\models\LoginForm;
use api\models\SignupForm;
use api\Exception\MyException;

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
     * @return \common\models\Token
     * @throws MyException
     */
    public function actionLogin()
    {
        $model = new LoginForm();
        $model->load(Yii::$app->request->bodyParams, '');
        $token = $model->auth();
        try {
            return $token;
        } catch(MyException $e) {
            echo $e->getMessage();
        }
    }


    /**
     * @return \common\models\User
     * @throws MyException
     */
    public function actionSignup()
    {

        $model = new SignupForm();
        $model->load(Yii::$app->request->bodyParams, '');
        $user = $model->signup();
        try {
            return $user;
        } catch (MyException $e) {
            echo $e->getMessage();
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
