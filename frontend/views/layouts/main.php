<?php

use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap5\BootstrapAsset;

BootstrapAsset::register($this);
AppAsset::register($this);
?>
<!DOCTYPE html>
<html dir="rtl" lang="fa">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>php tutorial || blog project || webprog.io</title>
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
        <?php $this->head() ?>
    </head>
    <body>

            <header
                class=" pb-3 mb-4 border-bottom"
            >
                <div class="container py-3 align-items-center d-flex flex-column flex-md-row ">
                    <a
                        href="/blog/blog"
                        class="fs-4 fw-medium link-body-emphasis text-decoration-none"
                    >
                        Heydari.io
                    </a>

                    <nav class="d-inline-flex mt-2 mt-md-0 me-md-auto">


                        <a
                            class="me-3 py-2 link-body-emphasis text-decoration-none"
                            href="/create/post"
                            >افزودن پست</a
                        >
                        <a
                            class="fw-bold me-3 py-2 link-body-emphasis text-decoration-none"
                            href="/blog/blog"
                            >صفحه اصلی</a
                        >

                    </nav>
                </div>
            </header>


            <main> 
                <?= $content ?>
            </main>
            

            <footer class="text-center pt-4 my-md-5 pt-md-5 border-top">
                <div class="row flex-column">
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

    </body>

    </html>