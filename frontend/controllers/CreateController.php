<?php

namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use frontend\models\Post;
use frontend\models\Category;
use yii\web\UploadedFile;


class CreateController extends Controller
{
    public $layout='blog';

    public function actionPost()
    {
        $model = new Post();
        $categorys = Category::find()->asArray()->orderBy(['created_at' => SORT_DESC])->all();
        $categorys = array_column($categorys, 'name', 'id');
        print_r($categorys).'<br>';
        return $this->render('post',['categorys' => $categorys, 'model' =>$model]);
    }
    public function actionSubmit()
{
    $post = new Post();
    $post->attributes = Yii::$app->request->post('post');
    
    $imageFile = UploadedFile::getInstanceByName('image');

    if ($imageFile) {
        $fileName = time() . '.' . $imageFile->extension;
        $filePath = Yii::getAlias('@frontend/web/images/') . $fileName;

        if ($imageFile->saveAs($filePath)) {
            $post->image = $fileName; 
        }
    }

    if ($post->save()) {
        Yii::$app->session->setFlash('success', 'اطلاعات با موفقیت ذخیره شد.');
    } else {
        Yii::$app->session->setFlash('error', 'خطا در ذخیره اطلاعات.');
    }

    return $this->redirect(['site/form']);
}


 }  