<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
AppAsset::register($this);
use yii\helpers\Url;
use yii\helpers\StringHelper;

?>


<div class="container py-3">
<?php if (Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success ">
                <?= Yii::$app->session->getFlash('success') ?>
            </div>
        <?php endif; ?>
<!-- Content Section -->
<section class="mt-4">
    <div class="row">
        <!-- Posts Content -->
        <div class="col-lg-8">
            <div class="row g-3">
            <?php foreach ($posts as $post):  ?>
                <div class="col-sm-6">
                    <div class="card posts">
                        <img
                            src="https://s3.ir-thr-at1.arvanstorage.com/mahdi-blog/post/images/<?= Html::encode($post->image)?>"
                            loading="lazy"
                            class="card-img-top fade-in-img"
                            alt="post-image"
                        />
                        <div class="card-body">
                            <div
                                class="d-flex justify-content-between"
                            >
                                <h5 class="card-title fw-bold">
                                <?= Html::encode($post->title)?>
                                </h5>
                                <div>

                                    <?= Html::tag('span',Html::encode($post->category ? $post->category->name : 'بدون دسته‌بندی') ,['class' => 'badge text-bg-secondary'])?>
                                </div>
                            </div>
                            <p
                                class="card-text text-secondary pt-3"
                            >

                            <?= StringHelper::truncate($post->body, 30) ?>

                            </p>
                            <div
                                class="d-flex justify-content-between align-items-center"
                            >

                                <?= Html::a('مشاهده', Url::to(['single', 'id' => Html::encode($post->id)]), ['class' => 'btn btn-sm btn-dark']) ?>

                                <p class="fs-7 mb-0">
                                    نویسنده : <?= Html::encode($post->writer)?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>

            
        </div>
        <!-- Sidebar Section -->
        <div class="col-lg-4">
            <!-- Sesrch Section -->
            <div class="card">
                <div class="card-body">
                    <p class="fw-bold fs-6">جستجو در وبلاگ</p>
                    <form action="/blog/search" method="get">
                        <div class="input-group mb-3">
                            <input
                                type="text"
                                name="kw"   
                                class="form-control"
                                placeholder="جستجو ..."
                            />
                            <button
                                class="btn btn-secondary"
                                type="submit"
                            >
                                <img src="/images/search.png" class="search-img" alt="">
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Categories Section -->
            <div class="card mt-4">
                <div class="fw-bold fs-6 card-header">دسته بندی ها</div>
                <ul class="list-group list-group-flush p-0">
                <?php  foreach ($categorys as $category): ?>
                    <li class="list-group-item">
                        <?= Html::a(Html::encode($category->name), ['/home', 'id' => $category->id], ['class' => 'link-body-emphasis text-decoration-none fa fa-leaf' ]) ?>
                    </li>
                <?php endforeach; ?>
                <li class="list-group-item">
                    <?= Html::a('همه', '/home', ['class'=> 'link-body-emphasis text-decoration-none'])?>
                </li>
                </ul>
            </div>

            <!-- Subscribue Section -->
            <div class="card mt-4">
                <div class="card-body">
                    <p class="fw-bold fs-6">عضویت در خبرنامه</p>
                    <?php
                    $form = ActiveForm::begin([
                        'id' => 'subscribe',
                        'options' => ['class' => 'form-horizontal'],
                    ]) ?>
                        <?= $form->field($model, 'name')->label('نام') ?>
                        <?= $form->field($model, 'email')->label('ایمیل')?>

                        <div class="form-group">
                            <div class="d-grid gap-2">
                                <?= Html::submitButton('ارسال', ['class' => 'btn btn-secondary mb-3 mt-3']) ?>
                            </div>
                        </div>
                    <?php ActiveForm::end() ?>

                </div>
            </div>


        </div>
    </div>
</section>
</div>