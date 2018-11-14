<?php
use common\assets\ToastAssetFe;
use frontend\widgets\FooterWidget;
use frontend\widgets\HeaderWidget;
use yii\helpers\Html;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use common\models\InfoPublic;
use yii\helpers\Url;
use yii\web\View;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
ToastAssetFe::register($this);
ToastAssetFe::config($this, [
    'positionClass' => ToastAssetFe::POSITION_TOP_LEFT
]);
$time = InfoPublic::findOne(InfoPublic::ID_DEFAULT)->time_show_order * 60000;
$orderUrl = Url::to(['shopping-cart/get-order']);
$js = <<<JS
    setInterval(
        function(){
            jQuery.post(
                '{$orderUrl}'
                )
                .done(function(result) {
                     toastr.info(result);
                })
        }, {$time}
    );
    
JS;
$this->registerJs($js, View::POS_END);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="home option2">
<div id="my-chart"></div>
<?php $this->beginBody() ?>
<?= Alert::widget() ?>

<?= HeaderWidget::widget() ?>

<?= $content ?>

<?= FooterWidget::widget()?>

<?php $this->endBody() ?>
<script lang="javascript">var _vc_data = {id : 6303816, secret : 'c8f19ce55ac5e08e09315c0c3c612295'};(function() {var ga = document.createElement('script');ga.type = 'text/javascript';ga.async=true; ga.defer=true;ga.src = '//live.vnpgroup.net/client/tracking.js?id=6303816';var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();</script>
</body>
</html>
<?php $this->endPage() ?>
