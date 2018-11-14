<?php
/**
 * Created by PhpStorm.
 * User: TuanPham
 * Date: 2/17/2017
 * Time: 8:26 AM
 */
use yii\helpers\Url;

?>
<div class="col-xs-12 col-sm-8 header-search-box">
    <form class="form-inline" action="<?= Url::to(['news/search']) ?>" method="post">
        <div class="form-group input-serach">
            <input id="keyword" name="keyword" type="text" value="<?= !empty($keyword)?''.$keyword:'' ?>" placeholder="<?= Yii::t('app', 'Tìm kiếm') ?>...">
        </div>
        <button type="submit" class="pull-right btn-search"></button>
    </form>
</div>