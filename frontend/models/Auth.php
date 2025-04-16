<?php 
namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class Auth extends ActiveRecord implements IdentityInterface
{
    public static function tableName()
    {
        return 'auth';
    }

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['username', 'string', 'max' => 30],
            ['password', 'string', 'max' => 200],
        ];
    }

    // برای Yii::$app->user
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return null;
    }

    public function validateAuthKey($authKey)
    {
        return true;
    }
}
