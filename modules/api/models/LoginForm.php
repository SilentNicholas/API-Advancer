<?php

namespace app\modules\api\models;

use app\models\Token;
use app\models\User;
use yii\base\Exception;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    const EXPIRED_TIME = 86400;
    public $email;
    public $password;
    private $user;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['email', 'password'], 'required'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }


    /**
     * @return Token
     * @throws Exception
     */
    public function auth()
    {
        if ($this->validate()) {
            $token = new Token();
            $token->user_id = $this->getUser()->id;
            $token->generateToken(time() + self::EXPIRED_TIME);
            if($token->save()) {
                return $token;
            }else{
                throw new Exception('Cannot save your token');
            }
        } else {
            throw new Exception('Invalid data in your request');
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->user === null) {
            $this->user = User::findByEmail($this->email);
        }

        return $this->user;
    }
}
