<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
?>
            <div class="container py-3">
                <section class="mt-4">
                    <div class="row">
                        <!-- Posts Content -->
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col">
                                    <?php if ($count!=0 and $kw!='')  { ?>
                                    <div class="alert alert-secondary">
                                        پست های مرتبط با کلمه [ <?php echo $kw ?> ]
                                    </div>
                                        <?php }else{ ?>
                                    <div class="alert alert-danger">
                                        مقاله مورد نظر پیدا نشد !!!!
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>

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
                                                    <?= Html::tag('span',Html::encode($post->category ? $post->category->name : 'بدون دسته‌بندی') ,['class' => 'badge text-bg-secondary'])?>

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
                                                <a
                                                    href="single?id=<?= Html::encode($post->id)?>"
                                                    class="btn btn-sm btn-dark"
                                                    >مشاهده</a
                                                >

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

        </div>
                    </div>
                </section>
            </div>