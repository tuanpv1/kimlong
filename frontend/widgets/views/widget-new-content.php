<?php
/**
 * Created by PhpStorm.
 * User: TuanPham
 * Date: 2/17/2017
 * Time: 4:19 PM
 */
use yii\helpers\Url;

?>
<div class="block left-module">
    <p class="title_block"><?= $name ?></p>
    <div class="block_content">
        <div class="owl-carousel owl-best-sell" data-loop="true" data-nav="false" data-margin="0"
             data-autoplayTimeout="1000" data-autoplay="true" data-autoplayHoverPause="true" data-items="1">
            <?php
            if (!empty($news)) {
                $i = 0;
                $n = count($news);
                /** @var \common\models\News $item */
                foreach ($news as $item) {
                    if ($i < 3) {
                        ?>
                        <ul class="products-block best-sell">
                            <li>
                                <div class="products-block-left">
                                    <a href="<?= Url::to(['news/detail', 'id' => $item->id]) ?>">
                                        <img src="<?= $item->getImageDisplayLink() ?>"
                                             alt="<?= $item->display_name ?>">
                                    </a>
                                </div>
                                <div class="products-block-right">
                                    <p class="product-name">
                                        <a href="<?= Url::to(['content/detail', 'id' => $item->id]) ?>"><?= $item->display_name ?></a>
                                    </p>
                                </div>
                            </li>
                        </ul>
                        <?php
                        $i++;
                    } else {
                        ?>
                        <ul class="products-block best-sell">
                            <li>
                                <div class="products-block-left">
                                    <a href="<?= Url::to(['content/detail', 'id' => $item->id]) ?>">
                                        <img src="<?= $item->getImageDisplayLink() ?>"
                                             alt="<?= $item->display_name ?>">
                                    </a>
                                </div>
                                <div class="products-block-right">
                                    <p class="product-name">
                                        <a href="<?= Url::to(['content/detail', 'id' => $item->id]) ?>"><?= $item->display_name ?></a>
                                    </p>
                                </div>
                            </li>
                        </ul>
                        <?php
                        $i++;
                    }
                }
            }
            ?>
        </div>
    </div>
</div>
