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

?>
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="<?= Url::home() ?>" title="Trang chủ">Trang chủ</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Dự án</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
            <div class="column col-xs-12 col-sm-3" id="left_column">
                <?= \frontend\widgets\WidgetNewContent::widget() ?>
            </div>
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <!-- category-slider -->
                <?php if (isset($banner)) { ?>
                    <div class="category-slider">
                        <ul class="owl-carousel owl-style2" data-dots="false" data-loop="<?= count($banner)>1?'true':false ?>" data-nav="true"
                            data-autoplayTimeout="1000" data-autoplayHoverPause="true" data-items="1">
                            <?php foreach ($banner as $item) {
                                /** @var \common\models\Slide $item */ ?>
                                <li>
                                    <img style="height:288px;" src="<?= $item->getSlideImage() ?>"
                                         alt="<?= $item->id ?>">
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
                <h2 class="page-heading">
                    <span class="page-heading-title2">Dự án</span>
                </h2>
                <ul class="blog-posts">
                    <?php
                    if ($news) {
                        /** @var News $new */
                        foreach ($news as $new) {
                            ?>
                            <li class="post-item">
                                <article class="entry">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="entry-thumb image-hover2">
                                                <a href="<?= Url::to(['news/project-detail', 'id' => $new->id]) ?>">
                                                    <img src="<?= $new->getImageDisplayLink() ?>"
                                                         alt="<?= $new->display_name ?>">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="entry-ci">
                                                <h3 class="entry-title">
                                                    <a href="<?= Url::to(['news/project-detail', 'id' => $new->id]) ?>">
                                                        <?= CUtils::substr($new->display_name, 25) ?>
                                                    </a>
                                                </h3>
                                                <div class="entry-meta-data">
                                                    <span class="author"><i class="fa fa-user"></i> by: <a
                                                            href="#"><?= $new->getUserCreated() ?></a></span>
                                                    <span class="cat"><i class="fa fa-folder-o"></i> <a
                                                            href="<?= Url::to(['news/projects']) ?>">Dự án</a></span>
                                                    <span class="date">
                                                        <i class="fa fa-calendar"></i> <?= date('d/m/Y H:i:s', $new->created_at) ?>
                                                    </span>
                                                </div>
                                                <div class="entry-excerpt">
                                                    <?= $new->short_description ?>
                                                </div>
                                                <div class="entry-more">
                                                    <a href="<?= Url::to(['news/project-detail', 'id' => $new->id]) ?>">Chi
                                                        tiết</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </li>
                            <?php
                        }
                    } else {
                        echo "Đang cập nhật";
                    }
                    ?>
                </ul>
                <div class="sortPagiBar clearfix">
                    <div class="bottom-pagination">
                        <?php
                        $pagination = new \yii\data\Pagination(['totalCount' => $pages->totalCount, 'pageSize' => 6]);
                        echo \yii\widgets\LinkPager::widget([
                            'pagination' => $pagination,
                        ]);
                        ?>
                    </div>
                </div>
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>
