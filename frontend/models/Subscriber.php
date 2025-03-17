<?php
namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

class Subscriber extends ActiveRecord
{
    public static function tableName()
    {
        return 'subscriber'; 
    }

    public function rules()
    {
        return [
            [['name', 'email'], 'required'], 
            ['email', 'email'], 
            [['name'], 'string', 'max' => 255],
        ];
    }
}
