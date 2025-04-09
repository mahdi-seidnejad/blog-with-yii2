<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use common\widgets\froala\FroalaEditorWidget;
AppAsset::register($this);
?>
<div class='container py-3'>
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
                    >
                        <h1 class="fs-3 fw-bold">ایجاد مقاله</h1>
                    </div>

                    <!-- Posts -->
                    <div class="mt-4">

                            
                    </div>
                </div>
                <div class='mb-4'></div>
<div class='container'>
    <?php
    $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal row g-4'],
    ]) ?>
        <div class='row mb-3'>
            <div class='col'>
                <?= $form->field($model, 'title')->label('عنوان مقاله') ?>
            </div>
            <div class='col'>
                <?= $form->field($model, 'writer')->label('نویسنده مقاله') ?>
            </div>
            <div class='col '>
                <?= $form->field($model, 'category_id')->dropdownList($categorys)->label('دسته بندی مقاله')?>
            </div>
        </div>
        <div class='row'>
            <div class='col-4'>
                <?= $form->field($model, 'image')->fileInput(['class'=>'form-control'])->label('تصویر مقاله') ?>
            </div>
        </div>
        <?= \froala\froalaeditor\FroalaEditorWidget::widget([
    'model' => $model,
    'attribute' => 'body',
    'options' => ['id' => 'auletter-body'],
    'clientOptions' => [
        'imageUpload' => true,
        'imageUploadURL' => \yii\helpers\Url::to(['/site/upload-image']),
        'imageUploadMethod' => 'POST',
        'imageUploadParams' => [
            'YII_CSRF_TOKEN' => Yii::$app->request->csrfToken,
        ],
        'toolbarButtons' => ['bold', 'italic', 'underline', 'insertImage'],
    ],
]); ?>
        
        <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11 text-start">
    <?= Html::submitButton('ایجاد', ['class' => 'btn btn-dark']) ?>
        </div>

        </div>
    <?php ActiveForm::end() ?>
</div>