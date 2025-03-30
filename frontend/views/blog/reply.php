<?php 
use yii\widgets\Pjax;
use yii\helpers\Html;
Pjax::begin(); ?>
<form id="comment-form" method="post" action="<?= Yii::$app->urlManager->createUrl(['site/comment']) ?>" data-pjax="true">
    <input type="hidden" name="post_id" value="<?= Html::encode($post->id) ?>">
    <div class="mb-3">
        <label class="form-label">نام</label>
        <input type="text" class="form-control" name="writer" />
    </div>
    <div class="mb-3">
        <label class="form-label">متن کامنت</label>
        <textarea class="form-control" name="body" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-dark">ارسال</button>
</form>
<?php Pjax::end(); ?>
