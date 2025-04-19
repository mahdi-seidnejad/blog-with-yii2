<?php
namespace frontend\controllers;
use Yii;
use yii\web\Controller;

use frontend\models\User;
class AuthController extends Controller
{
    public $layout='blog';
       public function actionSignup()
   {
       $model = new user();
   
       if ($model->load(Yii::$app->request->post())) {
   
        if ($model->password!=null){
           $model->password = Yii::$app->security->generatePasswordHash($model->password);
        }
           if ($model->save()) {
            Yii::$app->user->login($model);
               return $this->redirect(['/blog/blog']);
           } 

       }
   
       return $this->render('signup', ['model' => $model]);
   }
   
   public function actionLoginForm()
   {
       $model = new User();
       
       if (Yii::$app->request->isPost) {
           $model->load(Yii::$app->request->post());
           
           if ($model->validate()) {
               $user = User::findOne(['number' => $model->number]);
               
               if ($user && Yii::$app->security->validatePassword($model->password, $user->password)) {
                   if (Yii::$app->user->login($user, 3600)) { // 30 روز remember me
                       Yii::debug('User logged in successfully: ' . Yii::$app->user->id);
                       Yii::$app->session->setFlash('success', 'با موفقیت وارد شدید!');
                       return $this->redirect('/blog/blog');
                   } else {
                       Yii::error('Login failed for user: ' . $model->number);
                   }
               }
               
               Yii::$app->session->setFlash('error', 'نام کاربری یا رمز عبور اشتباه است.');
           }
       }
       
       return $this->render('loginform', ['model' => $model]);
   }
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['/blog/blog']);
    }
    public function actionUpdate(){
        $model = User::findOne(Yii::$app->user->identity->id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'اطلاعات کاربر با موفقیت بروزرسانی شد.');
            return $this->redirect(['/blog/blog']);
        }
        return $this->render('update',['model'=>$model]);
    }
}
