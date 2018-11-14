<?php
/**
 * Created by PhpStorm.
 * User: TuanPham
 * Date: 2/15/2017
 * Time: 10:16 PM
 */
use common\helpers\CUtils;
use common\models\Content;
use yii\helpers\Url;

?>
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <h2 class="page-heading">
                    <span class="page-heading-title">Tin tức dự án</span>
                </h2>
                <div class="latest-deals-product">
                    <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav="true"
                        data-margin="10" data-autoplayTimeout="1000" data-autoplayHoverPause="true"
                        data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":5}}'>
                        <?php if ($contents) {
                            /** @var \common\models\News $content */
                            foreach ($contents as $content) {
                                ?>
                                <li>
                                    <div class="left-block">
                                        <a href="<?= \yii\helpers\Url::to(['news/detail', 'id' => $content->id]) ?>">
                                            <img style="height: 180px" class="img-responsive product_image_<?= $content->id ?>" alt="product"
                                                 src="<?= $content->getImageDisplayLink('ld9.jpg') ?>"/>
                                        </a>
                                        <div class="quick-view">
                                            <a title="Quick view" class="search" href="<?= Url::to(['news/detail','id' => $content->id]) ?>"></a>
                                        </div>
                                    </div>
                                    <div class="right-block">
                                        <h5 class="product-name">
                                            <a href="<?= Url::to(['news/detail', 'id' => $content->id]) ?>">
                                                <span id="product_name_<?= $content->id ?>"><?= CUtils::substr($content->display_name, 50) ?></span>
                                            </a>
                                        </h5>
                                        <p><?= CUtils::substr($content->short_description,90) ?></p>
                                    </div>
                                </li>
                                <?php
                            }
                        } else {
                            echo "Đang cập nhật";
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
