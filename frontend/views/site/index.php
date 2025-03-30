<!-- <?php 
use yii\helpers\Html;
use frontend\assets\AppAsset;
AppAsset::register($this);
use yii\helpers\Url;

?>
<div class="container">
    <main class="flex flex-col items-center justify-center h-screen">
        <h1 class="text-4xl font-extrabold mb-4">به سایت ما خوش آمدید!</h1>
        <p class="text-lg text-gray-700 mb-6">یک سایت برای خبر های خوب</p>
        <a href="/blog/blog" class="btn btn-sm btn-dark">پست ها</a>
    </main>
</div> -->
<?php 
use yii\widgets\Pjax;

use yii\bootstrap5\Modal;
?>

<!-- دکمه‌ای که مقدار رو می‌فرسته -->
<?= Html::a('پاسخ دادن', 
    ['site/reply', 'comment_id' => 123, 'post' => 456], 
    [
        'class' => 'btn btn-primary',
        'id' => 'open-modal',
        'data-pjax' => '#pjax-modal-content',
    ]
); ?>

<!-- مودال که از قبل تو صفحه هست -->
<?php
Modal::begin([
    'id' => 'myModal',
    'title' => 'پاسخ دادن به کامنت',
    'size' => Modal::SIZE_LARGE,
    'closeButton' => ['class' => 'btn-close', 'data-bs-dismiss' => 'modal'],
    'options' => ['tabindex' => '-1'],
]);

Pjax::begin(['id' => 'pjax-modal-content']);
?>
    <div id="modal-content">
        <p>در حال بارگذاری...</p>
    </div>
<?php Pjax::end();

Modal::end();
?>
