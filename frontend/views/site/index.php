<?php
use frontend\widgets\GalleryWidget;
use frontend\widgets\HomeSlide;
use frontend\widgets\LatestDeals;
use yii\web\View;
?>
<!-- Home slideder-->
<?= HomeSlide::widget() ?>
<!-- END Home slideder-->

<?= \frontend\widgets\IntroduceWidget::widget() ?>

<div class="content-page">
    <div class="container">
        <?= \frontend\widgets\ContentBody::widget() ?>
    </div>
</div>

<?= LatestDeals::widget() ?>


<?php
//\frontend\widgets\ListNews::widget() ?>
