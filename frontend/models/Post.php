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
            [['title', 'body'], 'required'], 
            [['body'], 'string'],
            [['title'], 'string', 'max' => 200],
            [['image'], 'string', 'max' => 100],
            [['writer'],'string', 'max' => 200],
            [['category_id'], 'integer'],
            [['created_at']]
        ];
    }
    public function getCategory()
{
    return $this->hasOne(Category::class, ['id' => 'category_id']);
}

}