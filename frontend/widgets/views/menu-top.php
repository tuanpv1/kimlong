<?php
/**
 * Created by PhpStorm.
 * User: TuanPham
 * Date: 12/20/2016
 * Time: 5:06 PM
 */
use common\models\Category;
use common\models\News;
use yii\helpers\Url;
/** @var \common\models\InfoPublic $info */
?>
<div class="container">
    <div class="row">
    </div>
    <div id="main-menu" class="col-sm-8 main-menu">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="#">MENU</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?= Url::home() ?>">Trang chủ</a></li>
                        <li><a href="<?= Url::to(['news/projects']) ?>">Dự án</a></li>
                        <li><a href="<?= Url::to(['news/index']) ?>">Tin nội bộ</a></li>
                        <li><a href="<?= Url::to(['site/contact']) ?>">Liên hệ</a></li>
                        <li><a href="<?= Url::to(['site/about']) ?>">Giới thiệu</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
    </div>
    <div id="fix-phone-menu">
        <a href="tel:<?= $info->phone?$info->phone:'' ?>"><i class="glyphicon glyphicon-phone"></i> <?= $info->phone ?></a>
    </div>
</div>