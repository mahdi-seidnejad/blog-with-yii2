<?php
    use frontend\assets\AppAsset;
use SebastianBergmann\CodeCoverage\Report\PHP;
use yii\helpers\Html;
    AppAsset::register($this);
    use yii\bootstrap5\Modal;
    use yii\helpers\Url;
    use yii\widgets\Pjax;
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
                                   <?php Pjax::begin();?>
                                <hr class="mt-4" />
                                    <!-- Comment Content -->
                                    <p class="fw-bold fs-6">کامنت ها:</p>
                                    <?php foreach ($comments as $comment): 
                                    if ($comment->comment_id==null){
                                        ?>

                                    <div class="card  mb-3">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <h5 class="card-title me-2 mb-0"><?= Html::encode($comment->writer) ?></h5>
                                            </div>
                                            <div class='row'>
                                                <div class='col'>
                                                    <p class="card-text pt-3 pr-3 me-4"><?= Html::encode($comment->body) ?></p>
                                                </div>
                                                <div class='col-6'></div>
                                                <div class='col-1 g-0'>

                                                        <?= Html::a('<img class="img-fluid w-150" src="/images/reply_icon.png" alt="reply">', 
                                                            ['reply', 'comment_id' => 123, 'post' => 456], 
                                                            [   'data-url' => Url::to(['blog/reply', 'comment_id' => $comment->id , 'post'=>$post->id]),
                                                                'data-bs-toggle' => 'modal',
                                                                'data-bs-target' => '#myModal',
                                                                'class' => 'btn',
                                                                'id' => 'open-modal',
                                                            ]
                                                        ); ?>

                                                        <?php
                                                            Modal::begin([
                                                                'id' => 'myModal',
                                                                'title' => 'پاسخ دادن به کامنت',
                                                                'size' => Modal::SIZE_LARGE,
                                                                'closeButton' => ['class' => 'btn-close', 'data-bs-dismiss' => 'modal'],
                                                                'options' => ['tabindex' => '-1'],
                                                            ]);
                                                            ?>
                                                            <div class="modal-body" id="modal-content">در حال بارگذاری...</div>
                                                            <?php Modal::end(); ?>


                                                 </div>
                                            </div>
                                        </div>
                                    </div>
                                        <hr class="mt-4  bg-body-secondary" />
                                    <!-- Comment Content -->

                                        <?php foreach ($comments as $reply){ 
                                            if ($comment->id == $reply->comment_id and $reply->comment_id!=null){
                                            ?>
                                            <!-- <p class="fw-bold fs-6"> واکنش ها:</p> -->
                                                <div class="card bg-light -subtle mb-3 me-5 ">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center">
                                                            <h5 class="card-title me-2 mb-0"><?= Html::encode($reply->writer) ?></h5>
                                                        </div>
                                                        <div class='row'>
                                                            <div class='col'>
                                                                <p class="card-text pt-3 pr-3 me-4"><?= Html::encode($reply->body) ?></p>
                                                            </div>
                                                            <div class='col-6'></div>
                                                            <div class='col-1 g-0'>
                                                                <!-- <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#myModal">
                                                                    <img  class="img-fluid w-150" src="/images/reply_icon.png" alt="reply">
                                                                </button> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php }
                                        }
                                     } ?>
                                    <?php endforeach; ?>


                                </div>
                            </div>
                        </div>
                    <?php Pjax::end(); ?>
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




            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    console.log("✅ JavaScript is Loaded!");

                    document.querySelectorAll('[data-bs-toggle="modal"]').forEach(button => {
                        button.addEventListener('click', function(event) {
                            event.preventDefault();
                            var url = this.getAttribute('data-url');
                            
                            console.log('Loading modal content from:', url);
                            document.getElementById('modal-content').innerHTML = 'در حال بارگذاری...';

                            fetch(url)
                                .then(response => response.text())
                                .then(data => {
                                    document.getElementById('modal-content').innerHTML = data;
                                })
                                .catch(error => {
                                    document.getElementById('modal-content').innerHTML = '<p class="text-danger">خطا در بارگذاری محتوا!</p>';
                                    console.error("❌ Error loading modal content:", error);
                                });
                        });
                    });
                });
            </script>
            </div>  
    </section>
</div>

