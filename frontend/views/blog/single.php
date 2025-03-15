<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
AppAsset::register($this);
?>
                <!-- Content -->
            <div class="container py-3">
                <section class="mt-4">
                    <div class="row">
                        <!-- Posts & Comments Content -->
                        <div class="col-lg-8">
                            <div class="row justify-content-center">
                                <!-- Post Section -->
                                <?php foreach ($posts as $post):?>
                                <div class="col">
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
                                                    لورم ایپسوم
                                                </h5>
                                                <div>
                                                    <span
                                                        class="badge text-bg-secondary"
                                                        ><?= Html::encode($post->category ? $post->category->name : 'بدون دسته‌بندی') ?></span
                                                    >
                                                </div>
                                            </div>
                                            <p
                                                class="card-text text-secondary text-justify pt-3"
                                            >
                                                <?= Html::encode($post->body)?>
                                            </p>
                                            <div>
                                                <p class="fs-6 mt-5 mb-0">
                                                    نویسنده : <?= Html::encode($post->writer)?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <?php endforeach ?>
                                <hr class="mt-4" />

                                <!-- Comment Section -->
                                <div class="col">
                                    <!-- Comment Form -->
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="fw-bold fs-5">
                                                ارسال کامنت
                                            </p>

                                            <form method="post" action='<?= Yii::$app->urlManager->createUrl(['site/comment']) ?>'>
                                                <input type="hidden" name="post_id" value="<?= Html::encode($post->id) ?>">

                                                <div class="mb-3">
                                                    <label class="form-label"
                                                        >نام</label
                                                    >
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        name="writer"
                                                    />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label"
                                                        >متن کامنت</label
                                                    >
                                                    <textarea
                                                        class="form-control"
                                                        name='body'
                                                        rows="3"
                                                    ></textarea>
                                                </div>
                                                <button
                                                    type="submit"
                                                    class="btn btn-dark"
                                                >
                                                    ارسال
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                    <hr class="mt-4" />
                                    <!-- Comment Content -->
                                    <p class="fw-bold fs-6">کامنت ها:</p>
                                    <?php foreach ($comments as $comment): ?>
                                    <div class="card bg-light-subtle mb-3">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <h5 class="card-title me-2 mb-0"><?= Html::encode($comment->writer) ?></h5>
                                            </div>
                                            <p class="card-text pt-3 pr-3 mr-2"><?= Html::encode($comment->body) ?></p>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>


                                </div>
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

                    <form method="post" action="<?= Yii::$app->urlManager->createUrl(['site/submit']) ?>">
                        <input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->getCsrfToken(); ?>">
                        <div class="mb-3">
                            <label class="form-label">نام</label>
                            <input type="text" name="name" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ایمیل</label>
                            <input type="email" name="email" class="form-control" />
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-secondary">ارسال</button>
                        </div>
                    </form>
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
            </div>

