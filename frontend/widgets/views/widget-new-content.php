<?php
/**
 * Created by PhpStorm.
 * User: TuanPham
 * Date: 2/17/2017
 * Time: 4:19 PM
 */
use common\models\News;
use yii\helpers\Url;

?>
<?php if (isset($news) && !empty($news)) { ?>
    <div class="block left-module">
        <p class="title_block"><?= $name ?></p>
        <div class="block_content product-onsale">
            <ul class="product-list owl-carousel" data-loop="true" data-nav="false" data-margin="0"
                data-autoplayTimeout="1000" data-autoplayHoverPause="true" data-items="1" data-autoplay="true">
                <?php foreach ($news as $new) {
                    /** @var  \common\models\News $new */ ?>
                    <li>
                        <div class="product-container">
                            <div class="left-block">
                                <a href="<?= $new->type == News::TYPE_PRODUCT ? Url::to(['news/project-detail', 'id' => $new->id]) : Url::to(['news/detail', 'id' => $new->id]) ?>">
                                    <img class="img-responsive" alt="<?= $new->display_name ?>"
                                         src="<?= $new->getImageDisplayLink() ?>"/>
                                </a>
                            </div>
                            <div class="right-block">
                                <h5 class="product-name">
                                    <a href="<?= $new->type == News::TYPE_PRODUCT ? Url::to(['news/project-detail', 'id' => $new->id]) : Url::to(['news/detail', 'id' => $new->id]) ?>">
                                        <?= $new->display_name ?>
                                    </a>
                                </h5>
                                <div class="product-star">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                                <div class="content_price">
                                    <?= $new->short_description ?>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
<?php } ?>