<?php
namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

class Comments extends ActiveRecord
{
    public static function tableName()
    {
        return 'comments'; 
    }

    public function rules()
    {
        return [
            [['writer', 'body'], 'required'], 
            ['writer', 'string', 'max' => 100],   
            ['body', 'string'],    
            ['post_id', 'integer'],
        ];
    }
}