<?php
    use frontend\assets\AppAsset;
    use yii\helpers\Html;
    AppAsset::register($this);
    use yii\bootstrap5\Modal;
    use yii\helpers\Url;


    foreach ($comments as $comment): 
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

                    <?= Html::button(
                            Html::img('/images/reply_icon.png', ['class' => 'img-fluid w-150', 'alt' => 'reply']),
                            [
                                'class' => 'btn reply-button',
                                'data-url' => Url::to(['/comments/reply', 'comment_id' => $comment->id, 'post' => $post->id]),
                                'data-bs-toggle' => 'modal',
                                'data-bs-target' => '#myModal',
                            ]
                        ) ?>


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
