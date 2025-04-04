<?php

use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap5\BootstrapAsset;

AppAsset::register($this);
BootstrapAsset::register($this);

?>
<!DOCTYPE html>
<html dir="rtl" lang="fa">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>php tutorial || blog project || webprog.io</title>   
        <!-- Bootstrap CSS -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Bundle with Popper -->


        <?php $this->head() ?>
    </head>
    <body>

            <header
                class=" pb-3 mb-4 border-bottom"
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>