<?php

namespace api\controllers;

use Yii;
use yii\rest\Controller;
use api\models\LoginForm;
use api\models\SignupForm;
use yii\base\Exception;

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
     * login user
     * @throws Exception
     */
    public function actionLogin()
    {
        $model = new LoginForm();
        $model->load(Yii::$app->request->bodyParams, '');
        $token = $model->auth();
        try {
            if (!$token) {
                throw new Exception('You can not get authorization token');
            } else {
                return $token;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    /**
     * signup user
     * @throws Exception
     */
    public function actionSignup()
    {

        $model = new SignupForm();
        $model->load(Yii::$app->request->bodyParams, '');
        $user = $model->signup();
        try {
            if (!$user) {
                throw new Exception('You can not signup now');
            } else {
                return $user;
            }
        } catch (Exception $e) {
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
