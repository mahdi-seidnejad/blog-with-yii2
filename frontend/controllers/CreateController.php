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
            if ($model->load(Yii::$app->request->post())) {
                $imageFile = UploadedFile::getInstance($model, 'image');
        
                if ($imageFile) {
                    $imageName = time() . '-' . $imageFile->baseName . '.' . $imageFile->extension;
                    $imagePath = Yii::getAlias('@frontend/web/images/') . $imageName;
        
                    if ($imageFile->saveAs($imagePath)) {
                        $model->image = $imageName;
                    }
                }
        
                if ($model->save()) {
                    return $this->redirect('/site/success');
                }
            }
            return $this->render('post',['categorys' => $categorys, 'model' =>$model]);
        }
 }  