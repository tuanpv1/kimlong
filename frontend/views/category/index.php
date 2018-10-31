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

/** @var \common\models\Category $cat */

?>
    <div class="columns-container">
        <div class="container" id="columns">
            <!-- breadcrumb -->
            <?= \frontend\widgets\FindBreadcrumb::getBreadcrumbCate($cat->id) ?>
            <!-- ./breadcrumb -->
            <!-- row -->
            <div class="row">
                <!-- Left colunm -->
                <div class="column col-xs-12 col-sm-3" id="left_column">
                    <!-- block category -->
                    <!--                --><? //= \frontend\widgets\CategoryLeft::widget() ?>
                    <!-- ./block category  -->
                    <!-- block filter -->
                    <div class="block left-module">
                        <p class="title_block">Filter selection</p>
                        <div class="block_content">
                            <!-- layered -->
                            <div class="layered layered-filter-price">
                                <!-- filter categgory -->
                                <div class="layered_subtitle">CATEGORIES</div>
                                <div class="layered-content">
                                    <ul class="check-box-list">
                                        <li>
                                            <input type="checkbox" id="c1" name="cc"/>
                                            <label for="c1">
                                                <span class="button"></span>
                                                Tops<span class="count">(10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="c2" name="cc"/>
                                            <label for="c2">
                                                <span class="button"></span>
                                                T-shirts<span class="count">(10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="c3" name="cc"/>
                                            <label for="c3">
                                                <span class="button"></span>
                                                Dresses<span class="count">(10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="c4" name="cc"/>
                                            <label for="c4">
                                                <span class="button"></span>
                                                Jackets and coats<span class="count">(10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="c5" name="cc"/>
                                            <label for="c5">
                                                <span class="button"></span>
                                                Knitted<span class="count">(10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="c6" name="cc"/>
                                            <label for="c6">
                                                <span class="button"></span>
                                                Pants<span class="count">(10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="c7" name="cc"/>
                                            <label for="c7">
                                                <span class="button"></span>
                                                Bags & Shoes<span class="count">(10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="c8" name="cc"/>
                                            <label for="c8">
                                                <span class="button"></span>
                                                Best selling<span class="count">(10)</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                <!-- ./filter categgory -->
                                <!-- filter price -->
                                <div class="layered_subtitle">price</div>
                                <div class="layered-content slider-range">

                                    <div data-label-reasult="Range:" data-min="0" data-max="500" data-unit="$"
                                         class="slider-range-price" data-value-min="50" data-value-max="350"></div>
                                    <div class="amount-range-price">Range: $50 - $350</div>
                                    <ul class="check-box-list">
                                        <li>
                                            <input type="checkbox" id="p1" name="cc"/>
                                            <label for="p1">
                                                <span class="button"></span>
                                                $20 - $50<span class="count">(0)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="p2" name="cc"/>
                                            <label for="p2">
                                                <span class="button"></span>
                                                $50 - $100<span class="count">(0)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="p3" name="cc"/>
                                            <label for="p3">
                                                <span class="button"></span>
                                                $100 - $250<span class="count">(0)</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                <!-- ./filter price -->
                                <!-- filter color -->
                                <div class="layered_subtitle">Color</div>
                                <div class="layered-content filter-color">
                                    <ul class="check-box-list">
                                        <li>
                                            <input type="checkbox" id="color1" name="cc"/>
                                            <label style=" background:#aab2bd;" for="color1"><span
                                                        class="button"></span></label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="color2" name="cc"/>
                                            <label style=" background:#cfc4a6;" for="color2"><span
                                                        class="button"></span></label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="color3" name="cc"/>
                                            <label style=" background:#aab2bd;" for="color3"><span
                                                        class="button"></span></label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="color4" name="cc"/>
                                            <label style=" background:#fccacd;" for="color4"><span
                                                        class="button"></span></label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="color5" name="cc"/>
                                            <label style="background:#964b00;" for="color5"><span class="button"></span></label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="color6" name="cc"/>
                                            <label style=" background:#faebd7;" for="color6"><span
                                                        class="button"></span></label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="color7" name="cc"/>
                                            <label style=" background:#e84c3d;" for="color7"><span
                                                        class="button"></span></label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="color8" name="cc"/>
                                            <label style=" background:#c19a6b;" for="color8"><span
                                                        class="button"></span></label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="color9" name="cc"/>
                                            <label style=" background:#f39c11;" for="color9"><span
                                                        class="button"></span></label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="color10" name="cc"/>
                                            <label style=" background:#5d9cec;" for="color10"><span
                                                        class="button"></span></label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="color11" name="cc"/>
                                            <label style=" background:#a0d468;" for="color11"><span
                                                        class="button"></span></label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="color12" name="cc"/>
                                            <label style=" background:#f1c40f;" for="color12"><span
                                                        class="button"></span></label>
                                        </li>

                                    </ul>
                                </div>
                                <!-- ./filter color -->
                                <!-- ./filter brand -->
                                <div class="layered_subtitle">brand</div>
                                <div class="layered-content filter-brand">
                                    <ul class="check-box-list">
                                        <li>
                                            <input type="checkbox" id="brand1" name="cc"/>
                                            <label for="brand1">
                                                <span class="button"></span>
                                                Channelo<span class="count">(0)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="brand2" name="cc"/>
                                            <label for="brand2">
                                                <span class="button"></span>
                                                Mamypokon<span class="count">(0)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="brand3" name="cc"/>
                                            <label for="brand3">
                                                <span class="button"></span>
                                                Pamperson<span class="count">(0)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="brand4" name="cc"/>
                                            <label for="brand4">
                                                <span class="button"></span>
                                                Pumano<span class="count">(0)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="brand5" name="cc"/>
                                            <label for="brand5">
                                                <span class="button"></span>
                                                AME<span class="count">(0)</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                <!-- ./filter brand -->
                                <!-- ./filter size -->
                                <div class="layered_subtitle">Size</div>
                                <div class="layered-content filter-size">
                                    <ul class="check-box-list">
                                        <li>
                                            <input type="checkbox" id="size1" name="cc"/>
                                            <label for="size1">
                                                <span class="button"></span>X
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="size2" name="cc"/>
                                            <label for="size2">
                                                <span class="button"></span>XXL
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="size3" name="cc"/>
                                            <label for="size3">
                                                <span class="button"></span>XL
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="size4" name="cc"/>
                                            <label for="size4">
                                                <span class="button"></span>XXL
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="size5" name="cc"/>
                                            <label for="size5">
                                                <span class="button"></span>M
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="size6" name="cc"/>
                                            <label for="size6">
                                                <span class="button"></span>XXS
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="size7" name="cc"/>
                                            <label for="size7">
                                                <span class="button"></span>S
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="size8" name="cc"/>
                                            <label for="size8">
                                                <span class="button"></span>XS
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="size9" name="cc"/>
                                            <label for="size9">
                                                <span class="button"></span>34
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="size10" name="cc"/>
                                            <label for="size10">
                                                <span class="button"></span>36
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="size11" name="cc"/>
                                            <label for="size11">
                                                <span class="button"></span>35
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="size12" name="cc"/>
                                            <label for="size12">
                                                <span class="button"></span>37
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                <!-- ./filter size -->
                            </div>
                            <!-- ./layered -->

                        </div>
                    </div>
                    <!-- ./block filter  -->
                    <!-- SPECIAL -->
                    <?= \frontend\widgets\WidgetSaleContent::widget() ?>
                    <!-- ./SPECIAL -->
                    <!-- TAGS -->
                    <div class="block left-module">
                        <p class="title_block">TAGS</p>
                        <div class="block_content">
                            <div class="tags">
                                <a href="#"><span class="level1">actual</span></a>
                                <a href="#"><span class="level2">adorable</span></a>
                                <a href="#"><span class="level3">change</span></a>
                                <a href="#"><span class="level4">consider</span></a>
                                <a href="#"><span class="level3">phenomenon</span></a>
                                <a href="#"><span class="level4">span</span></a>
                                <a href="#"><span class="level1">spanegs</span></a>
                                <a href="#"><span class="level5">spanegs</span></a>
                                <a href="#"><span class="level1">actual</span></a>
                                <a href="#"><span class="level2">adorable</span></a>
                                <a href="#"><span class="level3">change</span></a>
                                <a href="#"><span class="level4">consider</span></a>
                                <a href="#"><span class="level2">gives</span></a>
                                <a href="#"><span class="level3">change</span></a>
                                <a href="#"><span class="level2">gives</span></a>
                                <a href="#"><span class="level1">good</span></a>
                                <a href="#"><span class="level3">phenomenon</span></a>
                                <a href="#"><span class="level4">span</span></a>
                                <a href="#"><span class="level1">spanegs</span></a>
                                <a href="#"><span class="level5">spanegs</span></a>
                            </div>
                        </div>
                    </div>
                    <!-- ./TAGS -->
                    <!-- Testimonials -->
                    <div class="block left-module">
                        <p class="title_block">Testimonials</p>
                        <div class="block_content">
                            <ul class="testimonials owl-carousel" data-loop="true" data-nav="false" data-margin="30"
                                data-autoplayTimeout="1000" data-autoplay="true" data-autoplayHoverPause="true"
                                data-items="1">
                                <li>
                                    <div class="client-mane">Roverto & Maria</div>
                                    <div class="client-avarta">
                                        <img src="assets/data/testimonial.jpg" alt="client-avarta">
                                    </div>
                                    <div class="testimonial">
                                        "Your product needs to improve more. To suit the needs and update your image up"
                                    </div>
                                </li>
                                <li>
                                    <div class="client-mane">Roverto & Maria</div>
                                    <div class="client-avarta">
                                        <img src="assets/data/testimonial.jpg" alt="client-avarta">
                                    </div>
                                    <div class="testimonial">
                                        "Your product needs to improve more. To suit the needs and update your image up"
                                    </div>
                                </li>
                                <li>
                                    <div class="client-mane">Roverto & Maria</div>
                                    <div class="client-avarta">
                                        <img src="assets/data/testimonial.jpg" alt="client-avarta">
                                    </div>
                                    <div class="testimonial">
                                        "Your product needs to improve more. To suit the needs and update your image up"
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- ./Testimonials -->
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
                                        <img style="height:288px;" src="<?= $item->getSlideImage() ?>"
                                             alt="<?= $item->id ?>">
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>
                    <!-- ./category-slider -->
                    <!-- subcategories -->
                    <div class="subcategories">
                        <ul>
                            <li class="current-categorie">
                                <a href="<?= Url::to(['category/index', 'id' => $cat->id]) ?>"><?= $cat->display_name ?></a>
                            </li>
                            <?= \frontend\widgets\CateRow::getCateRow($cat->id) ?>
                        </ul>
                    </div>
                    <!-- ./subcategories -->
                    <!-- view-product-list-->
                    <div id="view-product-list" class="view-product-list">
                        <h2 class="page-heading">
                            <span class="page-heading-title"><?= $cat->display_name ?></span>
                        </h2>
                        <ul class="display-product-option">
                            <li class="view-as-grid selected">
                                <span>grid</span>
                            </li>
                            <li class="view-as-list">
                                <span>list</span>
                            </li>
                        </ul>
                        <!-- PRODUCT LIST -->
                        <ul class="row product-list grid">
                            <?php if (isset($content)) { ?>
                                <?php foreach ($content as $item) {
                                    /** @var Content $item */ ?>
                                    <li class="col-sx-12 col-sm-4">
                                        <div class="left-block">
                                            <a href="<?= Url::to(['content/detail', 'id' => $item->id]) ?>">
                                                <img style="height: 366px" class="img-responsive product_image_<?= $item->id ?>" alt="product"
                                                     src="<?= $item->getFirstImageLinkFE() ?>"/>
                                            </a>
                                            <div class="quick-view">
                                                <a title="Add to my wishlist" class="heart" href="#"></a>
                                                <a title="Add to compare" class="compare" href="#"></a>
                                                <a title="Quick view" class="search" href="#"></a>
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="javascript:void(0)"
                                                   onclick="addCart(<?= $item->id ?>)">Mua</a>
                                            </div>
                                            <div class="group-price">
                                                <?php if ($item->price != $item->price_promotion && $item->price_promotion != 0) { ?>
                                                    <span class="product-sale">Sale</span>
                                                <?php }
                                                if ($item->type == Content::TYPE_NEWEST) { ?>
                                                    <span class="product-new">NEW</span>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name">
                                                <a href="<?= Url::to(['content/detail', 'id' => $item->id]) ?>">
                                                    <span id="product_name_<?= $item->id ?>"><?= CUtils::substr($item->display_name, 25) ?></span>-<span id="product_code_<?= $item->id ?>"><?= $item->code ?></span>
                                                </a>
                                            </h5>
                                            <input type="hidden" class="product_amount_<?= $item->id ?>" value="1">
                                            <div class="content_price">
                                                <span id="product_price_promotion_<?= $item->id ?>"
                                                      class="price product-price"><?= CUtils::formatNumber($item->price_promotion) ?>
                                                    Đ</span>
                                                <span id="product_price_<?= $item->id ?>"
                                                      class="price old-price"><?= CUtils::formatNumber($item->price) ?>
                                                    Đ</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                        <!-- ./PRODUCT LIST -->
                    </div>
                    <!-- ./view-product-list-->
                    <div class="sortPagiBar">
                        <div class="bottom-pagination">
                            <nav>
                                <?= \yii\widgets\LinkPager::widget(['pagination' => $pagination,]); ?>
                            </nav>
                        </div>
                        <div class="show-product-item">
                            <select name="">
                                <option value="">Show 18</option>
                                <option value="">Show 20</option>
                                <option value="">Show 50</option>
                                <option value="">Show 100</option>
                            </select>
                        </div>
                        <div class="sort-product">
                            <select>
                                <option value="">Product Name</option>
                                <option value="">Price</option>
                            </select>
                            <div class="sort-product-icon">
                                <i class="fa fa-sort-alpha-asc"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./ Center colunm -->
            </div>
            <!-- ./row-->
        </div>
    </div>
<?= \frontend\widgets\CartBox::getModal() ?>