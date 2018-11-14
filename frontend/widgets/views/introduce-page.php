<?php
/**
 * Created by PhpStorm.
 * User: TuanPV
 * Date: 11/12/2018
 * Time: 1:09 PM
 */
use common\models\News;
use yii\helpers\Url;

/** @var News $introduce */
?>
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="text-center">
                <h2><a title="<?= $introduce->display_name ?>"
                       href="<?= Url::to(['site/about']) ?>"><?= $introduce->display_name ?></a>
                </h2>
            </div>
        </div>

        <!-- Begin Services Row 1 -->
        <div class="page-top">
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12" id="fix-introduce-logo">
                <a href="<?= Url::to(['site/detail-news', 'id' => $introduce->id]) ?>"
                   title="<?= $introduce->display_name ?>">
                    <img width="200px" src="<?= $introduce->getImageDisplayLink() ?>"
                         alt="<?= $introduce->display_name ?>" title="<?= $introduce->display_name ?>">
                </a>
            </div>

            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                <p class="text-left" style="padding-top: 28px">
                    <?= $introduce->short_description ?>
                </p>
            </div>
        </div>
        <!-- End Serivces Row 1 -->
    </div>
</div>