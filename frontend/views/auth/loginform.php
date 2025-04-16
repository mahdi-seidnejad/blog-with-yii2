<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'ورود';
?>


<div class="container mt-5 d-flex justify-content-center">
    <div class="card p-4 shadow" style="width: 400px; border-radius: 16px;">
        <h4 class="mb-4 text-center"><?= Html::encode($this->title) ?></h4>

        <!-- نمایش پیام‌های فلش -->
        <?php if (Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success">
                <?= Yii::$app->session->getFlash('success') ?>
            </div>
        <?php endif; ?>
        
        <?php if (Yii::$app->session->hasFlash('error')): ?>
            <div class="alert alert-danger">
                <?= Yii::$app->session->getFlash('error') ?>
            </div>
        <?php endif; ?>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <?= $form->field($model, 'number')->textInput(['autofocus' => true])->label('نام کاربری') ?>
            <?= $form->field($model, 'password')->passwordInput()->label('رمز عبور') ?>

            <div class="d-grid gap-2 mt-4">
                <?= Html::submitButton('ورود', ['class' => 'btn btn-dark']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>