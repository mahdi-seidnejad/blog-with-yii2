<?php

namespace frontend\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $number
 * @property string $password
 * @property string|null $email
 * @property string|null $name
 * @property string|null $lastname
 * @property int|null $gender
 * @property string|null $date
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface

{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'name', 'lastname', 'gender', 'date', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['number', 'password'], 'required'],
            [['gender', 'created_at', 'updated_at'], 'integer'],
            [['date'], 'safe'],
            [['number', 'name'], 'string', 'max' => 30],
            [['password'], 'string', 'max' => 200],
            [['email'], 'string', 'max' => 255],
            [['lastname'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'شماره موبایل',
            'password' => 'رمز عبور',
            'email' => 'ایمیل',
            'name' => 'اسم',
            'lastname' => 'فامیل',
            'gender' => 'جنسیت',
            'date' => 'تاریخ تولد',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
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
