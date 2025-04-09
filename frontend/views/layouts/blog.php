<?php


use yii\bootstrap5\BootstrapAsset;
use backend\assets\AppAsset;
use yii\helpers\Html;

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

                    <?= Html::a('Heydari.io', ['/home'], ['class' => 'fs-4 fw-medium link-body-emphasis text-decoration-none']) ?>
                    <nav class="d-inline-flex mt-2 mt-md-0 me-md-auto">


                        <?= Html::a('افزودن پست', ['create/post'], ['class' => 'me-3 py-2 link-body-emphasis text-decoration-none']) ?>

                        <?= Html::a('صفحه اصلی', ['/home'], ['class' => 'fw-bold me-3 py-2 link-body-emphasis text-decoration-none']) ?>
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
                            کلیه حقوق محتوا این سایت متعلق به وب سایت Heydari.io
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
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
        <?php

?>
<?php $this->endBody() ?>

    </body>

    </html>
    <?php $this->endPage();