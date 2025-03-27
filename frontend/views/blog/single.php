<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
AppAsset::register($this);
use yii\bootstrap5\Modal;
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
                                                <?= Html::tag('span',Html::encode($post->category ? $post->category->name : 'بدون دسته‌بندی') ,['class' => 'badge text-bg-secondary'])?>

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
                                            <div class='row'>
                                                <div class='col'>
                                                    <p class="card-text pt-3 pr-3 mr-2"><?= Html::encode($comment->body) ?></p>
                                                </div>
                                                <div class='col-6'></div>
                                                <div class='col-1 g-0'>
                                                    <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#myModal">
                                                        <img  class="img-fluid w-150" src="/images/reply_icon.png" alt="reply">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>


                                </div>
                            </div>
                        </div>

                        <!-- Sidebar Section -->
        <div class="col-lg-4">
            <!-- Sesrch Section -->


            <!-- Categories Section -->


            <!-- Subscribue Section -->
            <div class="card ">
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


            <?php
            Modal::begin([
                'id' => 'myModal',
                'title' => 'واکنش',
                'size' => Modal::SIZE_LARGE, 
                'closeButton' => ['class' => 'btn-close m-2', 'data-bs-dismiss' => 'modal'],
                'options' => ['tabindex' => '-1'], 
            ]);
            ?>
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

            <?php Modal::end();
            ?>
            </div>
            <?php 
            // echo Yii::getAlias('@frontend'); 
            // echo \Yii::getAlias('@web') . ' exists';
            // var_dump(Yii::getAlias('@web'));
            ?>
            </div>  
    </section>
</div>

