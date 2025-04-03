<?php
use yii\helpers\Html;
?>

<form id="reply-form" method="post" action='<?= Yii::$app->urlManager->createUrl(['comments/comment','id'=>$post]) ?>' data-pjax="true">
    <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>">

    <input type="hidden" name="comment_id" value="<?= Html::encode($comment_id) ?>">
    <input type="hidden" name="post_id" value="<?= Html::encode($post) ?>">

    <div class="mb-3">
        <label class="form-label">نام</label>
        <input type="text" class="form-control" name="writer" required />
    </div>
    
    <div class="mb-3">
        <label class="form-label">متن کامنت</label>
        <textarea class="form-control" name='body' rows="3" required></textarea>
    </div>
    
    <button type="submit" class="btn btn-dark">ارسال</button>
</form>

