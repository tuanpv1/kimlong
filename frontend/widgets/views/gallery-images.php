<?php
/**
 * Created by PhpStorm.
 * User: TuanPV
 * Date: 11/12/2018
 * Time: 1:08 PM
 */
?>
<div class="category-featured fashion">
    <h2 class="page-heading">
        <span class="page-heading-title">Hình ảnh một số dự án</span>
    </h2><br><br>

    <div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:900px;margin:100px auto 0px;">
        <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
            <ul class="amazingslider-slides" style="display:none;">
                <?php if($news){
                    /** @var \common\models\News $new */
                    foreach ($news as $new){
                        ?>
                        <li><img src="<?= $new->getImageDisplayLink() ?>" alt="<?= $new->display_name ?>"  title="<?= $new->display_name ?>" />
                        </li>
                        <?php
                    }
                } ?>

            </ul>
            <ul class="amazingslider-thumbnails" style="display:none;">

                <?php if($news){
                    /** @var \common\models\News $new */
                    foreach ($news as $new){
                        ?>
                        <li><img src="<?= $new->getImageDisplayLink() ?>" alt="<?= $new->display_name ?>"  title="<?= $new->display_name ?>" />
                        </li>
                        <?php
                    }
                } ?>

            </ul>
        </div>
    </div>
</div>
