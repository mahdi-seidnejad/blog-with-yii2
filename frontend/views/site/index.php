<?php 
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
</div>