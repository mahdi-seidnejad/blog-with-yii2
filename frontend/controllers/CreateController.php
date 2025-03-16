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
        $categorys = Category::find()->orderBy(['created_at' => SORT_DESC])->all();
        return $this->render('post',['categorys' => $categorys]);
    }
    public function actionSubmit()
{
    $post = new Post();
    $post->load(Yii::$app->request->post(), '');


    $imageFile = UploadedFile::getInstanceByName('image');

    if ($imageFile) {
        $fileName = time() . '.' . $imageFile->extension;
        $filePath = Yii::getAlias('@frontend/web/images/') . $fileName;

        if ($imageFile->saveAs($filePath)) {
            $post->image = $fileName; 
        }
    }
    
    $post->title = Yii::$app->request->post('title');
    $post->writer = Yii::$app->request->post('writer');
    $post->category_id = Yii::$app->request->post('category_id');
    $post->body = Yii::$app->request->post('body');

    if ($post->save()) {
        Yii::$app->session->setFlash('success', 'اطلاعات با موفقیت ذخیره شد.');
    } else {
        Yii::$app->session->setFlash('error', 'خطا در ذخیره اطلاعات.');
    }

    return $this->redirect(['site/form']);
}


 }  