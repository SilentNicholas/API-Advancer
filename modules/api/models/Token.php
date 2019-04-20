<?php

namespace app\modules\api\models;

use app\models\User;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%token}}".
 *
 * @property int $id
 * @property string $user_id
 * @property string $token
 * @property int $expired_at
 *
 * @property User $user
 */
class Token extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%token}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),		// Auto timestamp created and updated properties
        ];
    }

    public function fields()
    {
        return [
            'id',
            'user_id',
            'token',
            'expired_at'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'token', 'expired_at'], 'required'],
            [['user_id', 'expired_at'], 'integer'],
            [['token'], 'string', 'max' => 255],
            [['token'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'token' => 'Token',
            'expired_at' => 'Expired At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function generateToken($expire)
    {
        $this->expired_at = $expire;
        $this->token = Yii::$app->security->generateRandomString();
    }
}
