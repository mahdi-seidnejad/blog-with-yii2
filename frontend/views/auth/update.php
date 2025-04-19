<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'ویرایش اطلاعات';
?>

<div class="container mt-5 d-flex justify-content-center">
    <div class="card p-4 shadow" style=" border-radius: 16px;">
        <h4 class="mb-4 text-center"><?= Html::encode($this->title) ?></h4>

        <?php $form = ActiveForm::begin([
                'action' => ['auth/update'], // آدرس اکشن آپدیت
                'method' => 'post',
            ]); ?>

            <?= $form->field($model, 'number')->textInput(['autofocus' => true])->label('شماره موبایل') ?>


            <?= $form->field($model, 'email')->textInput()->label('ایمیل') ?>

            <div class="row">
                <div class="col">
                <?= $form->field($model, 'name')->textInput()->label('نام') ?>
                </div>
                <div class="col">
                <?= $form->field($model, 'lastname')->textInput()->label('نام خانوادگی') ?>
                </div>
            </div>




            <?= $form->field($model, 'date')->input('date')->label('تاریخ تولد') ?> 
            <?= $form->field($model, 'gender')->radioList([1 => 'مرد', 2 => 'زن'])->label('جنسیت') ?>
        <div class="d-grid gap-2 mt-4">
            <?= Html::submitButton('ویرایش', ['class' => 'btn btn-dark']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
