<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
AppAsset::register($this);
?>
                <div class='container py-3'>
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
                    >
                        <h1 class="fs-3 fw-bold">ایجاد مقاله</h1>
                    </div>

                    <!-- Posts -->
                    <div class="mt-4">
                    <form class="row g-4" name='post' method="post" enctype="multipart/form-data" action="<?= Yii::$app->urlManager->createUrl(['create/submit']) ?>">
                    <?= \yii\helpers\Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->csrfToken) ?>                            <div class="col-12 col-sm-6 col-md-4">
                                <label class="form-label">عنوان مقاله</label>
                                <input type="text"  name="title" class="form-control" />
                            </div>

                            <div class="col-12 col-sm-6 col-md-4">
                                <label class="form-label">نویسنده مقاله</label>
                                <input type="text" name="writer" class="form-control" />
                            </div>

                            <div class="col-12 col-sm-6 col-md-4">
                                <label class="form-label"
                                    >دسته بندی مقاله</label
                                >
                                <select class="form-select" name="category_id">
                                    <?php foreach ($categorys as $category){ ?>
                                        <option value="<?=Html::encode($category->id) ?>"><?=Html::encode($category->name)?></option>
                                    <?php }?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-6 col-md-4">
                                <label for="formFile" class="form-label"
                                    >تصویر مقاله</label
                                >
                                <input name="image" class="form-control" type="file" />
                            </div>

                            <div class="col-12">
                                <label for="formFile" class="form-label"
                                    >متن مقاله</label
                                >
                                <textarea
                                    class="form-control"
                                    name="body"
                                    rows="6"
                                ></textarea>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-dark">
                                     ایجاد
                                </button>
                            </div>
                        </form>
                    </div>
                </div>