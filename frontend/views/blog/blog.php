<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
AppAsset::register($this);
use yii\helpers\Url;
?>


<div class="container py-3">
<!-- <section>
    <div id="carousel" class="carousel slide">
        <div class="carousel-indicators">
            <button
                type="button"
                data-bs-target="#carousel"
                data-bs-slide-to="0"
                class="active"
            ></button>
            <button
                type="button"
                data-bs-target="#carousel"
                data-bs-slide-to="1"
            ></button>
            <button
                type="button"
                data-bs-target="#carousel"
                data-bs-slide-to="2"
            ></button>
        </div>
        <div class="carousel-inner rounded">
            <div
                class="carousel-item overlay carousel-height active"
            >
                <img
                    src="
                    /images/1.jpg"
                    class="d-block w-100"
                    alt="post-image"
                />
                <div class="carousel-caption d-none d-md-block">
                    <h5>لورم ایپسوم متن</h5>
                    <p>
                        لورم ایپسوم متن ساختگی با تولید سادگی
                        نامفهوم از صنعت چاپ و با استفاده
                    </p>
                </div>
            </div>
            <div class="carousel-item carousel-height overlay">
                <img
                    src="/images/1.jpg"
                    class="d-block w-100"
                    alt="post-image"
                />
                <div class="carousel-caption d-none d-md-block">
                    <h5>لورم ایپسوم متن</h5>
                    <p>
                        لورم ایپسوم متن ساختگی با تولید سادگی
                        نامفهوم از صنعت چاپ و با استفاده
                    </p>
                </div>
            </div>
            <div class="carousel-item carousel-height overlay">
                <img
                    src="/images/1.jpg"
                    class="d-block w-100"
                    alt="post-image"
                />
                <div class="carousel-caption d-none d-md-block">
                    <h5>لورم ایپسوم متن</h5>
                    <p>
                        لورم ایپسوم متن ساختگی با تولید سادگی
                        نامفهوم از صنعت چاپ و با استفاده
                    </p>
                </div>
            </div>
        </div>
        <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carousel"
            data-bs-slide="prev"
        >
            <span class="carousel-control-prev-icon"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carousel"
            data-bs-slide="next"
        >
            <span class="carousel-control-next-icon"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section> -->

<!-- Content Section -->
<section class="mt-4">
    <div class="row">
        <!-- Posts Content -->
        <div class="col-lg-8">
            <div class="row g-3">
            <?php foreach ($posts as $post):  ?>
                <div class="col-sm-6">
                    <div class="card">
                        <img
                            src="/images/<?= Html::encode($post->image)?>"
                            class="card-img-top"
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
                                    <span
                                        class="badge text-bg-secondary"
                                        ><?= Html::encode($post->category ? $post->category->name : 'بدون دسته‌بندی') ?>
                                        </span
                                    >
                                </div>
                            </div>
                            <p
                                class="card-text text-secondary pt-3"
                            >
                                <?= Html::encode($post->body)?>
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
                                <i class="bi bi-search"></i>
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
                        <?= Html::a(Html::encode($category->name), ['blog/blog', 'id' => $category->id], ['class' => 'link-body-emphasis text-decoration-none']) ?>
                    </li>
                <?php endforeach; ?>
                <li class="list-group-item">
                    <a class='link-body-emphasis text-decoration-none' href="/blog/blog">همه</a>
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

            <!-- About Section -->
            <div class="card mt-4">
                <div class="card-body">
                    <p class="fw-bold fs-6">درباره ما</p>
                    <p class="text-justify">
                        لورم ایپسوم متن ساختگی با تولید سادگی
                        نامفهوم از صنعت چاپ و با استفاده از
                        طراحان گرافیک است. چاپگرها و متون بلکه
                        روزنامه و مجله در ستون و سطرآنچنان که
                        لازم است و برای شرایط فعلی تکنولوژی مورد
                        نیاز و کاربردهای متنوع با هدف بهبود
                        ابزارهای کاربردی می باشد.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>