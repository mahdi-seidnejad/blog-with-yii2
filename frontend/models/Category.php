<?php
namespace frontend\models;
use Yii;
use yii\db\ActiveRecord;

class category extends ActiveRecord
{
    public static function tableName()
    {
        return 'category'; 
    }

    public function rules()
    {
        return [
            [['name'], 'required'], 
            [['name'], 'string', 'max' => 100],
            [['created_at']]
        ];
    }
}