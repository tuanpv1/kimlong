<?php
/**
 * Created by PhpStorm.
 * User: TuanPV
 * Date: 11/2/2018
 * Time: 7:53 AM
 */
?>

<?php
/**
 * Created by PhpStorm.
 * User: TuanPham
 * Date: 2/20/2017
 * Time: 8:22 AM
 */
use common\helpers\CUtils;
use common\models\Content;
use yii\helpers\Url;

/** @var \common\models\Category $category */

?>
<div class="columns-container">
    <div class="container" id="columns">
        <div class="breadcrumb clearfix">
            <a class="home" href="<?= Url::to(['site/index']) ?>" title="<?= Yii::$app->name ?>">
                <?= Yii::t('app', 'Trang chủ') ?>
            </a>
            <span class="navigation-pipe">&nbsp;</span>
            <a href="#" title="Tìm kiếm">Tìm kiếm sản phẩm</a>
        </div>
        <!-- row -->
        <div class="row">
            <!-- Left colunm -->
            <div class="column col-xs-12 col-sm-3" id="left_column">
                <?= \frontend\widgets\WidgetNewContent::widget(['project' => true]) ?><br>
            </div>
            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <!-- category-slider -->
                <?php if (isset($banner)) { ?>
                    <div class="category-slider">
                        <ul class="owl-carousel owl-style2" data-dots="false" data-loop="true" data-nav="true"
                            data-autoplayTimeout="1000" data-autoplayHoverPause="true" data-items="1">
                            <?php foreach ($banner as $item) {
                                /** @var \common\models\Slide $item */ ?>
                                <li>
                                    <img style="height:140px;" src="<?= $item->getSlideImage() ?>"
                                         alt="<?= $item->id ?>">
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
                <!-- ./category-slider -->
                <div id="replaceHtmlContents">
                    <!-- subcategories -->
                    <div class="subcategories">
                        <ul>
                            <li class="current-categorie">
                                <a href="#">Tìm kiếm </a>
                            </li>
                            <li>
                                <a href="#">Từ khoá tìm kiếm "<?= $keyword ?>"</a>
                                <input type="hidden" id="keywordSearch" value="<?= $keyword ?>">
                            </li>
                        </ul>
                    </div>
                    <!-- ./subcategories -->
                    <!-- view-product-list-->
                    <div id="view-product-list" class="view-product-list">
                        <h2 class="page-heading">
                            <span class="page-heading-title">Kết quả tìm kiếm cho "<?= $keyword ?>"</span>
                        </h2>
                        <ul class="display-product-option">
                            <li class="view-as-grid selected">
                                <span>grid</span>
                            </li>
                        </ul>
                        <?php if (!empty($news)) { ?>
                            <!-- PRODUCT LIST -->
                            <ul class="row product-list grid">
                                <?php
                                /** @var \common\models\News $item */
                                foreach ($news as $item) { ?>
                                    <li class="col-sx-12 col-sm-4">
                                        <div class="left-block">
                                            <a href="<?= Url::to(['content/detail', 'id' => $item->id]) ?>">
                                                <img style="height: 150px"
                                                     class="img-responsive product_image_<?= $item->id ?>"
                                                     alt="product"
                                                     src="<?= $item->getImageDisplayLink('p35.jpg') ?>"/>
                                            </a>
                                            <div class="quick-view">
                                                <a title="Quick view" class="search"
                                                   href="<?= Url::to(['content/detail', 'id' => $item->id]) ?>"></a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name text-center">
                                                <a href="<?= Url::to(['content/detail', 'id' => $item->id]) ?>">
                                                    <?php if($item['type'] == \common\models\News::TYPE_PRODUCT){
                                                        echo "Dự án: ";
                                                    }else{
                                                        echo "Tin dự án: ";
                                                    } ?>
                                                    <span id="product_name_<?= $item['id'] ?>"><?= CUtils::substr($item->display_name, 25) ?></span>
                                                </a>
                                            </h5>
                                            <p> <?= CUtils::substr($item['short_description'], 90)?> </p>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                            <!-- ./PRODUCT LIST -->
                        <?php } else {
                            echo "<br>Không có kết quả phù hợp";
                        } ?>
                    </div>
                    <!-- ./view-product-list-->
                    <div class="sortPagiBar">
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
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>
