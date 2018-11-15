<?php
/**
 * Created by PhpStorm.
 * User: TuanPV
 * Date: 10/29/2018
 * Time: 12:02 PM
 */
use common\helpers\CUtils;
use common\models\News;
use yii\helpers\Url;
use yii\web\View;
use frontend\widgets\FormLogin;

if(!empty($message)){
    if($success){
        $show = 'true';
    }else{
        $show = 'false';
    }
}else{
    $message = '';
    $show = '';
}

if(empty($show_login)){
    $show_login = '';
}
$js_toastr = <<<JS
    $('#myModal').modal('show');
    var show_login = '{$show_login}';
    if(show_login == 'show'){
        $("#my-chart").addClass("loading");
        $('#myModal').modal('show');
        $("#my-chart").removeClass("loading");
    }
    var show ='{$show}';
    if(show == 'true'){
        toastr.success('{$message}');
    }
    if(show == 'false'){
        toastr.warning('{$message}');
    }
JS;
$this->registerJs($js_toastr, View::POS_READY);
/** @var $new News */
?>
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="<?= Url::home() ?>" title="Trang chủ">Trang chủ</a>
            <span class="navigation-pipe">&nbsp;</span>
            <a class="home" href="<?= Url::to(['news/index']) ?>" title="Dự án">Dự án</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span> <?= $new->display_name ?></span>
        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
            <div class="column col-xs-12 col-sm-3" id="left_column">
                <?= \frontend\widgets\WidgetNewContent::widget() ?>
                <!--./left silde-->
            </div>
            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <h1 class="page-heading">
                    <span class="page-heading-title2"><?= $new->display_name ?></span>
                </h1>
                <article class="entry-detail">
                    <div class="entry-meta-data">
                        <span class="author">
                        <i class="fa fa-user"></i>
                        by: <a href="#"><?= $new->getUserCreated() ?></a></span>
                        <span class="cat">
                            <i class="fa fa-folder-o"></i>
                            <a href="<?= Url::to(['news/index']) ?>">Dự án</a>
                        </span>
                        <span class="date"><i
                                    class="fa fa-calendar"></i> <?= date('d/m/Y H:i:s', $new->created_at) ?></span>
                    </div>
                    <div class="entry-photo">
                        <img src="<?= $new->getImageDisplayLink() ?>" alt="<?= $new->display_name ?>">
                    </div>
                    <div class="content-text clearfix">
                        <?= $new->short_description ?>
                    </div>
                    <?php if ($new->map && $new->video) { ?>
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <iframe width="560" height="315" src="<?= $new->video ?>" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                        </div>
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <?= $new->map ?>
                        </div>
                    <?php } else { ?>
                        <div class="content-text text-center">

                            <?php if ($new->map) {
                                echo $new->map;
                            } else if ($new->video) { ?>
                                <iframe width="560" height="315" src="<?= $new->video ?>" frameborder="0"
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </article>
                <!-- tab product -->
                <div class="product-tab">
                    <ul class="nav-tab">
                        <li class="active">
                            <a aria-expanded="false" data-toggle="tab"
                               href="#product-detail"><?= Yii::t('app', 'Tổng quan') ?></a>
                        </li>
                        <li><a data-toggle="tab" href="#tab-position">Vị trí dự án</a></li>
                        <li><a data-toggle="tab" href="#tab-utilities">Tiện ích</a></li>
                        <li><a data-toggle="tab" href="#tab-design">Thiết kế</a></li>
                        <li><a data-toggle="tab" href="#tab-legal">Pháp lý</a></li>
                        <li><a data-toggle="tab" href="#tab-own">Chủ đầu tư</a></li>
                    </ul>
                    <div class="tab-container">
                        <div id="product-detail" class="tab-panel active">
                            <?= $new->content ? $new->content : Yii::t('app', 'Đang cập nhật') ?>
                        </div>
                        <div id="tab-position" class="tab-panel"><?= $new->position ?></div>
                        <div id="tab-utilities" class="tab-panel"><?= $new->utilities ?></div>
                        <div id="tab-design" class="tab-panel"><?= $new->design ?></div>
                        <div id="tab-legal" class="tab-panel"><?= $new->legal ?></div>
                        <div id="tab-own" class="tab-panel"><?= $new->own ?></div>
                    </div>
                </div>
            </div>
            <!-- ./ Center colunm -->
        </div>

        <!-- Related Posts -->
        <div class="page-top single-box">
            <h2>Dự án liên quan</h2>
            <ul class="related-posts owl-carousel" data-dots="false" data-loop="true" data-nav="true"
                data-margin="30" data-autoplayTimeout="1000" data-autoplayHoverPause="true"
                data-responsive='{"0":{"items":1},"600":{"items":2},"1000":{"items":3}}'>
                <?php if (!empty($relatedNews)) {
                    /** @var News $newR */
                    foreach ($relatedNews as $newR) {
                        ?>
                        <li class="post-item">
                            <article class="entry">
                                <div class="entry-thumb image-hover2">
                                    <a href="<?= Url::to(['news/project-detail', 'id' => $newR->id]) ?>">
                                        <img style="height: 200px" src="<?= $newR->getImageDisplayLink() ?>"
                                             alt="<?= $newR->display_name ?>">
                                    </a>
                                </div>
                                <div class="entry-ci">
                                    <h3 class="entry-title"><a
                                                href="<?= Url::to(['news/project-detail', 'id' => $newR->id]) ?>"><?= CUtils::substr($newR->display_name, 25) ?></a>
                                    </h3>

                                    <div class="entry-meta-data">
                                        <p><?= $new->short_description ?></p><br>
                                        <span class="date">
                                                    <i class="fa fa-calendar"></i> <?= date('d/m/Y H:i:s', $newR->created_at) ?>
                                                </span>
                                    </div>
                                    <div class="entry-more">
                                        <a href="<?= Url::to(['news/project-detail', 'id' => $newR->id]) ?>">Chi tiết</a>
                                    </div>
                                </div>
                            </article>
                        </li>
                        <?php
                    }
                } ?>
            </ul>
        </div>
        <!-- ./row-->
    </div>
</div>
<?= FormLogin::widget() ?>