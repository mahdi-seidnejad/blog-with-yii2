<?php
use yii\helpers\Html;
?>

<form method="post" action='<?= Yii::$app->urlManager->createUrl(['site/comment']) ?>'>
    <input type="hidden" name="comment_id" value="<?= Html::encode($comment_id) ?>">
    <input type="hidden" name="post_id" value="<?= Html::encode($post) ?>">

    <div class="mb-3">
        <label class="form-label">نام <?= Html::encode($comment_id) ?></label>
        <input type="text" class="form-control" name="writer" />
    </div>
    
    <div class="mb-3">
        <label class="form-label">متن کامنت</label>
        <textarea class="form-control" name='body' rows="3"></textarea>
    </div>
    
    <button type="submit" class="btn btn-dark">ارسال</button>
</form>

