<?php

namespace frontend\controllers;
use Yii;
use yii\helpers\Json;
use yii\web\Controller;
use frontend\models\Post;
use frontend\models\Category;
use yii\web\UploadedFile;
use yii\web\Response;
use common\components\S3Uploader;



class CreateController extends Controller
{
    public $layout='blog';

    public function actionPost()
    {
        $model = new Post();
        $categorys = Category::find()->asArray()->orderBy(['created_at' => SORT_DESC])->all();
        $categorys = array_column($categorys, 'name', 'id');
        if (!Yii::$app->user->isGuest){
            $model->writer = Yii::$app->user->identity->name;
            if ($model->load(Yii::$app->request->post())) {
                $uploadedFile = UploadedFile::getInstance($model, 'image');
        
                if ($uploadedFile) {
                    $fileName = time() . '-' . $uploadedFile->baseName . '.' . $uploadedFile->extension;
        
                    // مسیر موقت برای ذخیره فایل
                    $tempPath = Yii::getAlias('@frontend/web/uploads/tmp/') . $fileName;
                    if ($uploadedFile->saveAs($tempPath)) {
        
                        // آپلود به S3
                        $key = 'post/images/' . time() . '-' . $uploadedFile->baseName . '.' . $uploadedFile->extension;
                        $result = Yii::$app->s3->putObject([
                            'Bucket' => 'mahdi-blog',
                            'Key' => $key,
                            'SourceFile' => $tempPath,
                            'ACL' => 'public-read'

                        ]);
        
                        @unlink($tempPath); // حذف فایل محلی
        
                        if (isset($result['ObjectURL'])) {
                            // فقط اسم فایل رو ذخیره کن، یا می‌تونی URL کامل رو ذخیره کنی
                            $model->image = $fileName; // یا $model->image = $result['ObjectURL'];
                        } else {
                            throw new \yii\web\ServerErrorHttpException('Failed to upload to S3.');
                        }
                    }
                }
            }
        }else{
            Yii::$app->session->setFlash('error', 'لطفا ابتدا لاگین کنید');
            return $this->redirect('/auth/login-form');
        }
            if ($model->validate() && $model->save()) {
                return $this->redirect('/site/success');
            }
        
    
        return $this->render('post', [
            'categorys' => $categorys,
            'model' => $model
        ]);
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