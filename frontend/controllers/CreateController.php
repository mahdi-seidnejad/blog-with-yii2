<?php

namespace frontend\controllers;
use Yii;
use yii\helpers\Json;
use yii\web\Controller;
use frontend\models\Post;
use frontend\models\Category;
use yii\web\UploadedFile;
use yii\web\Response;


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
        public function actionUploadImage()
        {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            
            $file = UploadedFile::getInstanceByName('file'); // فایل ارسالی از Froala
            
            if ($file) {
                // مسیر ذخیره‌سازی تصاویر (مثال: `web/uploads/images`)
                $uploadPath = \Yii::getAlias('@webroot/uploads/images');
                
                // ایجاد پوشه اگر وجود ندارد
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }
                
                // تولید نام یکتا برای فایل
                $fileName = time() . '_' . uniqid() . '.' . $file->extension;
                $filePath = $uploadPath . '/' . $fileName;
                
                // ذخیره فایل روی سرور
                if ($file->saveAs($filePath)) {
                    // آدرس قابل دسترسی از وب
                    $imageUrl = \Yii::getAlias('@web/uploads/images/' . $fileName);
                    
                    // پاسخ مورد انتظار Froala (با ساختار JSON)
                    return [
                        'link' => $imageUrl // این آدرس در ادیتور نمایش داده می‌شود
                    ];
                }
            }
            
            // در صورت خطا
            return ['error' => 'آپلود تصویر失敗 شد.'];
        }
    
 }  