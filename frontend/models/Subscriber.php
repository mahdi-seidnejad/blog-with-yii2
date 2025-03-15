<?php
namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

class Subscriber extends ActiveRecord
{
    public static function tableName()
    {
        return 'subscriber'; // نام جدول در دیتابیس
    }

    public function rules()
    {
        return [
            [['name', 'email'], 'required'], // الزامی بودن فیلدها
            ['email', 'email'], // اعتبارسنجی ایمیل
            ['name', 'string', 'max' => 255], // محدودیت طول نام
        ];
    }
}
