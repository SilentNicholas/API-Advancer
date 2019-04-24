<?php

namespace app\modules\api\controllers;

use app\models\SignupForm;
use Yii;
use yii\db\Exception;
use yii\rest\Controller;
use app\modules\api\models\LoginForm;
use yii\web\Response;

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
     * @return \app\models\Token|LoginForm|null
     * @throws \yii\base\Exception
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
     * @return array
     * @throws Exception
     * @throws \yii\base\Exception
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->bodyParams, '');
            if($model->signup()){
                return [
                    'name' => $model->name,
                    'email' => $model->email,
                ];
            }else{
                throw new Exception('User already exist');
            }
        }else{
            throw new Exception('Invalid data');
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
