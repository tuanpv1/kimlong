<?php
/**
 * Created by PhpStorm.
 * User: TuanPV
 * Date: 10/28/2018
 * Time: 4:07 PM
 */
use frontend\widgets\FormLogin;
use frontend\widgets\MenuRight;
use frontend\widgets\MenuTop;
use yii\helpers\Url;

/** @var $info \common\models\InfoPublic */
?>
<div id="header" class="header">
    <!-- MAIN HEADER -->
    <div class="container main-header">
        <div class="row">
            <div class="col-xs-12 col-sm-3 logo">
                <a href="<?= Url::home() ?>">
                    <img id="fix-logo-header" alt="<?= Yii::$app->name ?>"
                         src="<?= \common\models\InfoPublic::getImage($info->image_header) ?>"/></a>
            </div>
            <?= \frontend\widgets\SearchCategory::widget() ?>
        </div>

    </div>
    <!-- END MANIN HEADER -->
    <div id="nav-top-menu" class="nav-top-menu">
        <?= MenuTop::widget() ?>
        <!-- userinfo on top-->
        <div id="form-search-opntop">
        </div>
    </div>
</div>

<!-- Start Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="box-authentication tp_001">
                <?= FormLogin::widget() ?>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->