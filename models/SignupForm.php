<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SignupForm extends Model
{
    public $name;
    public $email;
    public $password;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['name', 'email', 'password'], 'required'],
            [['name'], 'string'],
            [['email'], 'email'],
            [['email'], 'unique', 'targetClass' => User::className(), 'targetAttribute'=>'email']
        ];
    }


    /**
     * @return bool
     * @throws \yii\base\Exception
     */
    public function signup()
    {
        if($this->validate()) {
            $user = new User;
            $user->attributes = $this->attributes;
            $user->setPassword($user->attributes['password']);
            return $user->create();
        }
    }
}
