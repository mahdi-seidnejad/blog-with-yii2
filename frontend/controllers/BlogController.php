<?php
namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use frontend\models\Post;
use frontend\models\Category;
use frontend\models\Comments;
use frontend\models\Subscriber;
use frontend\models\User;
class BlogController extends Controller
{
    public $layout = 'blog'; 
    
    public function actionBlog($id = 0)
    {
        $categorys = Category::find()->orderBy(['created_at' => SORT_DESC])->all();
        if ($id == 0){
            $posts = Post::find()->orderBy(['created_at' => SORT_DESC])->all();
        }else{
            $posts = Post::find()->where(['category_id' => $id])->all();
        } 
        $subscriber = new Subscriber();
        // $subscriber->attributes = \Yii::$app->request->post('subscribe');
        if ($subscriber->load(Yii::$app->request->post()) && $subscriber->save()) {
            return $this->redirect(['site/success']);
        }   
        return $this->render('blog', ['posts' => $posts , 'categorys'=>$categorys, 'model'=>$subscriber]); 
    }
    public function actionSingle($id)
    {
        $categorys = Category::find()->orderBy(['created_at' => SORT_DESC])->all();
        $posts = Post::find()->where(['id' => $id])->one();
        $categoryId = $posts->category_id;
        $samePost = Post::find()->where(['category_id' => $categoryId])->orderBy(['id' => SORT_DESC])->all();
        $comments = Comments::find()->where(['post_id' => $id])->all();
        $comment = new Comments();
        if ($comment->load(Yii::$app->request->post(), '') && $comment->save()) {

            $comment = new Comments();
        }
        return $this->render('single', [
            'post' => $posts , 
            'categorys' => $categorys, 
            'comments' => $comments,
            'samePosts' => $samePost,
        ]);      
    }
    public function actionSearch()
    {   
        $request = Yii::$app->request;
        $get = $request->get();
        $kw = $request->get('kw');
        $categorys = Category::find()->orderBy(['created_at' => SORT_DESC])->all();
        $posts = Post::find()->where(['like', 'title', $kw])->all();
        $count = Post::find()->where(['like','title',$kw])->count();
        return $this->render('search', ['posts' => $posts , 'categorys' => $categorys ,"kw"=>$kw, 'count'=>$count]);
    }
    public function actionMyPost(){
        $writer = Yii::$app->user->identity->name;
        $post = Post::find()->where(['writer' => $writer])->all();
        return $this->render('my-post', ['posts'=>$post]);
    }
    public function actionUpdate($id){

        $model = Post::find()->where(['id' => $id])->one();
        $categorys = Category::find()->orderBy(['created_at' => SORT_DESC])->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'پست با موفقیت بروزرسانی شد.');
            return $this->redirect(['/blog/blog']);
        }
        return $this->render('update', ['model' => $model,
        'categorys'=>$categorys] );
    }
    

    
}

