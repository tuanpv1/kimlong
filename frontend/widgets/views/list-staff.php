<?php
/**
 * Created by PhpStorm.
 * User: TuanPham
 * Date: 2/16/2017
 * Time: 1:46 PM
 */
use common\models\News;
use yii\helpers\Url;

?>

<div id="content-wrap">
    <div class="container">
        <!-- blog list -->
        <div class="blog-list">
            <h2 class="page-heading">
                <span class="page-heading-title">Chuyên viên tư vấn</span>
            </h2>
            <div class="blog-list-wapper">
                <ul class="owl-carousel" data-dots="false" data-loop="true" data-nav="true" data-margin="30"
                    data-autoplayTimeout="500" data-autoplayHoverPause="true"
                    data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                    <?php
                    if ($staffs) {
                        /** @var News $staff */
                        foreach ($staffs as $staff) {
                            ?>
                            <li>
                                <div class="post-desc text-center">
                                    <h5 class="post-title">
                                        <a href="#"><?= $staff->display_name ?> - <?= $staff->phone ?></a>
                                    </h5>
                                </div>
                                <div class="text-center">
                                    <span class="price product-price">
                                         <?= $staff->short_description ?>
                                    </span>
                                </div>
                                <div class="product-star text-center">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                            </li>
                            <?php
                        }
                    } else {
                        ?>
                        Chưa có nội dung
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!-- ./blog list -->
    </div> <!-- /.container -->
</div>
