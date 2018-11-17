<?php
use common\models\InfoPublic;
use yii\helpers\Url;

/** @var  $info InfoPublic */
?>
<footer id="footer">
    <div class="container">
        <!-- introduce-box -->
        <div id="introduce-box" class="row">
            <div class="col-md-3">
                <div id="address-box">
                    <a href="#"><img id="fix-logo-footer" src="<?= InfoPublic::getImage($info->image_header) ?>"
                                     alt="<?= Yii::$app->name ?>"/></a>

                </div>
            </div>
            <div class="col-md-3">
                <div class="introduce-title"><?= Yii::$app->name ?></div>
                <div id="address-list">
                    <div class="tit-name">Địa chỉ:</div>
                    <div class="tit-contain"><?= $info->address ?>.</div>
                    <div class="tit-name">Phone:</div>
                    <div class="tit-contain"><?= $info->phone ?></div>
                    <div class="tit-name">Email:</div>
                    <div class="tit-contain"><?= $info->email ?></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="introduce-title">Truy cập nhanh</div>
                <ul id="introduce-company" class="introduce-list">
                    <li><a href="<?= Url::to(['site/about']) ?>">Giới thiệu</a></li>
                    <li><a href="<?= Url::to(['news/projects']) ?>">Dự án</a></li>
                    <li><a href="<?= Url::to(['news/index']) ?>">Tin nội bộ</a></li>
                    <li><a href="<?= Url::to(['site/contact']) ?>">Liên hệ <?= $info->phone ?></a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <div id="contact-box">
                    <div class="introduce-title">Kết nối cùng <?= Yii::$app->name ?></div>
                    <div class="social-link">
                        <a href="<?= $info->link_face ?>"><i class="fa fa-facebook"></i></a>
                        <a href="<?= $info->youtube ?>"><i class="fa fa-youtube-play"></i></a>
                        <a href="<?= $info->twitter ?>"><i class="fa fa-twitter"></i></a>
                        <a href="<?= $info->google ?>"><i class="fa fa-google-plus"></i></a>
                    </div>
                </div>
            </div>
        </div><!-- /#introduce-box -->

        <div id="footer-menu-box">
            <div class="col-sm-12">
                <ul class="footer-menu-list">
                    <li><a href="<?= Url::to(['site/about']) ?>"><?= Yii::$app->name ?></a></li>
                </ul>
            </div>
            <p class="text-center">Copyrights &#169; 2018 - <?= date('Y') . ' ' . Yii::$app->name ?> . All Rights
                Reserved. Designed by TP</p>
        </div><!-- /#footer-menu-box -->
    </div>
</footer>
<a href="tel:<?= $info->phone?$info->phone:'' ?>" class="call_phone">
    <img src="<?= Url::base() ?>/admin/img/to2.gif" alt="Phone">
</a>
<a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>