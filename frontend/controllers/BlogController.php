<?php
namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use frontend\models\Post;
use frontend\models\Category;
use frontend\models\Comments;
use frontend\models\Subscriber;
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
        $posts = Post::find()->where(['id' => $id])->all();
        $comments = Comments::find()->where(['post_id' => $id])->all();

        return $this->render('single', ['posts' => $posts , 'categorys' => $categorys, 'comments' => $comments]);
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
}