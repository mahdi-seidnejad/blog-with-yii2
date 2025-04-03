<?php
    use frontend\assets\AppAsset;
use SebastianBergmann\CodeCoverage\Report\PHP;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
    AppAsset::register($this);
    use yii\bootstrap5\Modal;
    use yii\helpers\Url;
    use yii\widgets\Pjax;
    use yii\web\JqueryAsset;
    use yii\widgets\PjaxAsset;
    JqueryAsset::register($this);
PjaxAsset::register($this);
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
                                            <p class="fw-bold fs-5 mb-2">
                                                ارسال کامنت
                                            </p>

                                            <form class=" mb-2" id="comment-form" data-pjax="true" method="post" action='<?= Yii::$app->urlManager->createUrl(['comments/comment','id'=>$posts[0]->id]) ?>'>
                                                <input type="hidden" name="post_id" value="<?= Html::encode($post->id) ?>">
                                                <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>">


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


                                    <?php Pjax::begin(['id' => 'pjax-comments', 'timeout' => 5000]); ?>
                                        <?= $this->render('/comments/_comments', ['comments' => $comments, 'post' => $post]) ?>
                                    <?php Pjax::end(); ?>

                        <!-- Sidebar Section -->
        <div class="col-lg-4">

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
$js = <<<JS
    $(document).on("submit", "#comment-form", function(event) {
        event.preventDefault();

        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function(response) {
                $.pjax.reload({container: "#pjax-comments", push: false, replace: false, timeout: 5000});
                    $("#comment-form")[0].reset();
            },
            error: function() {
                alert("❌ خطا در ارسال کامنت!");
            }
        });
    });
JS;
$this->registerJs($js, \yii\web\View::POS_READY);
?>


            </div>  

</div>

