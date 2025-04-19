<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
AppAsset::register($this);
use yii\helpers\Url;
use yii\helpers\StringHelper;

?>
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