<?php

namespace app\modules\api\controllers;

use app\models\SignupForm;
use Yii;
use yii\rest\Controller;
use app\modules\api\models\LoginForm;
use yii\web\Response;

class SiteController extends Controller
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
     * @return string|Response
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->bodyParams, '');
            if($model->signup()){
                return $model;
            }
        }
        return $model;
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
