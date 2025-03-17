<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
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
                        <form class="row g-4" name='post' method="post" enctype="multipart/form-data" action="<?= Yii::$app->urlManager->createUrl(['create/submit']) ?>">
                            <div class="col-12 col-sm-6 col-md-4">
                                    <label class="form-label">عنوان مقاله</label>
                                    <input type="text"  name="title" class="form-control" />
                                </div>

                                <div class="col-12 col-sm-6 col-md-4">
                                    <label class="form-label">نویسنده مقاله</label>
                                    <input type="text" name="writer" class="form-control" />
                                </div>

                                <div class="col-12 col-sm-6 col-md-4">
                                    <label class="form-label"
                                        >دسته بندی مقاله</label
                                    >
                                    <select class="form-select" name="category_id">

                                    </select>
                                </div>

                                <div class="col-12 col-sm-6 col-md-4">
                                    <label for="formFile" class="form-label"
                                        >تصویر مقاله</label
                                    >
                                    <input name="image" class="form-control" type="file" />
                                </div>

                                <div class="col-12">
                                    <label for="formFile" class="form-label"
                                        >متن مقاله</label
                                    >
                                    <textarea
                                        class="form-control"
                                        name="body"
                                        rows="6"
                                    ></textarea>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-dark">
                                        ایجاد
                                    </button>
                                </div>
                            </div>
                        </form>
                            
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
        <div class='row mt-3'>
            <div class='col'>
                <?= $form->field($model, 'body')->textarea(['class' => 'form-control ', 'rows' => 7])->label('متن مقاله') ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('ایجاد', ['class' => 'btn btn-dark']) ?>
            </div>
        </div>
    <?php ActiveForm::end() ?>
</div>