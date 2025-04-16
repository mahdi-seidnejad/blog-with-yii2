<?php


use yii\bootstrap5\BootstrapAsset;
use backend\assets\AppAsset;
use yii\helpers\Html;
BootstrapAsset::register($this);
$this->registerCssFile('https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css');
$this->registerJsFile('https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js', [
    'depends' => \yii\web\JqueryAsset::class
]);
AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html dir="rtl" lang="fa">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
    <body class="site-bg">
    <?php $this->beginBody() ?>

            <header
                class=" pb-3 mb-4 border-bottom bg-body-secondary"
            >
                <div class="container py-3 align-items-center d-flex flex-column flex-md-row ">

                    <?= Html::a('Sn.io', ['/home'], ['class' => 'fs-4 fw-medium link-body-emphasis text-decoration-none']) ?>
                    <?= Html::a('صفحه اصلی', ['/home'], ['class' => 'fw-bold me-3 py-2 link-body-emphasis text-decoration-none']) ?>
                    <?= Html::a('افزودن پست', ['create/post'], ['class' => 'me-3 py-2 link-body-emphasis text-decoration-none']) ?>


                    <nav class="d-inline-flex mt-2 mt-md-0 me-md-auto">



                    <?php if (!Yii::$app->user->isGuest): ?>
    <div class="dropdown">
        <a class="custom-toggle me-3 py-2 d-flex align-items-center" href="#" 
           role="button" id="dropdownMenuLink" 
           data-bs-toggle="dropdown" aria-expanded="false">
            <span class="arrow-down me-2"></span>
            <img src="/images/profile.png" class="profile-img" alt="">
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><?= Html::a('خروج', ['/auth/logout'], [
                'data-method' => 'post',
                'class' => 'dropdown-item'
            ]) ?></li>
        </ul>
    </div>
<?php else: ?>
    <div class="row">
        <div class="auth col w-100">
            <?= Html::a('ثبت نام', ['/auth/signup'], [
                'class' => 'btn btn-secondary btn-sm fs-6 w-100'
            ]) ?>
        </div>
        <div class="auth col w-100">
            <?= Html::a('ورود', ['/auth/login-form'], [
                'class' => 'btn btn-secondary fs-6 w-100'
            ]) ?>
        </div>
    </div>
<?php endif ?>
                    </nav>
                </div>
            </header>


            <main> 
                <?= $content ?>
            </main>
            

            <footer class="text-center pt-4 my-md-5 pt-md-5 border-top">
                <div class="row flex-column ">
                    <div class='container py-3'>
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
                    <div>
                        <p class="">
                            کلیه حقوق محتوا این سایت متعلق به وب سایت Sn.io
                            میباشد
                        </p>
                    </div>
                    <div>
                        <a href="#"
                            ><i
                                class="bi bi-telegram fs-3 text-secondary ms-2"
                            ></i
                        ></a>
                        <a href="#"
                            ><i
                                class="bi bi-whatsapp fs-3 text-secondary ms-2"
                            ></i
                        ></a>
                        <a href="#"
                            ><i class="bi bi-instagram fs-3 text-secondary"></i
                        ></a>
                    </div>
                </div>
            </footer>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <?php

?>
<?php $this->endBody() ?>

    </body>

    </html>
    <?php $this->endPage();