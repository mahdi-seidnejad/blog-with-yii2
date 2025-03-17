<?php
namespace frontend\models;
use Yii;
use yii\db\ActiveRecord;

class Post extends ActiveRecord
{
    public static function tableName()
    {
        return 'post'; 
    }

    public function rules()
    {
        return [
            [['title', 'body', 'category_id'], 'required'],
            [['body'], 'string'],
            [['title', 'writer'], 'string', 'max' => 200],
            [['image'], 'string', 'max' => 255], 
            [['category_id'], 'integer'],
            [['created_at', 'id'], 'safe'],

        ];
    }
    
    public function getCategory()
{
    return $this->hasOne(Category::class, ['id' => 'category_id']);
}

}