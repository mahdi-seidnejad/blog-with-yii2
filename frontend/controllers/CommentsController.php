<?php
namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use frontend\models\Post;
use frontend\models\Category;
use frontend\models\Comments;
class CommentsController extends Controller{
    public $layout='blog';
    public function actionReply($comment_id, $post)
    {

        $comment = new Comments();
        $comment->writer = Yii::$app->user->identity->name;
        if ($comment->load(Yii::$app->request->post(), '') && $comment->save()) {
            $comment = new Comments();
        } 
        else{
            return $this->renderPartial('_modal_content', [
                'comment_id' => $comment_id,
                'post' => $post,
        ]);
    }
    }
    public function actionComment($id)
    {
        if (!Yii::$app->user->isGuest){
            $comment = new Comments();
    
            if ($comment->load(Yii::$app->request->post(), '')) {
                $comment->writer = Yii::$app->user->identity->name;

                if ($comment->save()) {

    
                    $comments = Comments::find()->where(['post_id' => $id])->all();
                    $posts = Post::find()->where(['id' => $id])->one();
    
                    return $this->render('_comments', [
                        'comments' => $comments,
                        'post' => $posts,
                    ]);
                }
            }
        } else {
            Yii::$app->session->setFlash('error', 'لطفا ابتدا لاگین کنید');
            return $this->redirect('/auth/login-form');
        }
    }
    
}