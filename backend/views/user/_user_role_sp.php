<?php

use common\assets\ToastAsset;
use kartik\grid\GridView;
use yii\web\View;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\Select2;
use common\models\AuthItem;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\User */

?>
<?php
ToastAsset::register($this);
ToastAsset::config($this, [
    'positionClass' => ToastAsset::POSITION_TOP_RIGHT
]);

$authItemGridId = "authItemSPGridId";
$formID= "add-permission-form-sp";

$revokeUrl = Url::to(['user/revoke-auth-item']);

$js = <<<JS
function revokeItemSP(item){
    if(confirm("Bạn có thực sự muốn xóa quyền '" + item + "' khỏi user '" + "$model->username" + "' không?")){
    jQuery.post(
        '{$revokeUrl}'
        ,{ user: "$model->id", item:item}
        )
        .done(function(result) {
            if(result.success){
                toastr.success(result.message);
                jQuery.pjax.reload({container:'#{$authItemGridId}'});
            }else{
                toastr.error(result.message);
            }
        })
        .fail(function() {
            toastr.error("server error");
    });
    }
}
JS;

$this->registerJs($js, View::POS_END);

$js = <<<JS
// get the form id and set the event
jQuery('#{$formID}').on('beforeSubmit', function(e) {
    \$form = jQuery('#{$formID}');
   $.post(
        \$form.attr("action"), // serialize Yii2 form
        \$form.serialize()
    )
        .done(function(result) {
            if(result.success){
                toastr.success(result.message);
                jQuery.pjax.reload({container:'#{$authItemGridId}'});
            }else{
                toastr.error(result.message);
            }
        })
        .fail(function() {
            toastr.error("server error");
        });
    return false;
}).on('submit', function(e){
    e.preventDefault();
});
JS;
$this->registerJs($js, View::POS_END);
?>

<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption"><i class="fa fa-globe"></i>Quản phân quyền bên SP</div>
    </div>

    <div class="portlet-body">
        <h3 class="form-section">Nhóm quyền</h3>
        <?= GridView::widget([
            'id' => $authItemGridId,
            'dataProvider' => $model->getAuthItemProvider(AuthItem::ACC_TYPE_SP),
            'responsive' => true,
            'pjax' => true,
            'hover' => true,
            'columns' => [
                ['class' => 'kartik\grid\SerialColumn'],
                [
                    'attribute' => 'name',
                    'format' => 'html',
                    'vAlign' => 'middle',
                    'value' => function ($model, $key, $index, $widget) {
                        /**
                         * @var $model \common\models\AuthItem
                         */
                        $res = Html::a($model->name);
                        if ($model->type == AuthItem::TYPE_ROLE) {
                            $res .= " [" . sizeof($model->children) . "]";
                        }
                        return $res;
                    },
                ],
                [
                    'attribute' => 'description',
                    'vAlign' => 'middle',
                ],
                [
                    'attribute' => 'type',
                    'format' => 'html',
                    'vAlign' => 'middle',
                    'value' => function ($model, $key, $index, $widget) {
                        /**
                         * @var $model \common\models\AuthItem
                         */
                        $res = $model->type == AuthItem::TYPE_PERMISSION?"Quyền" : "Nhóm quyền";
                        return $res;
                    },
                ],
                ['class' => 'yii\grid\ActionColumn',
                    'template' => '{revoke}',
                    'buttons'=> [
                        'revoke' => function ($url, $model1, $key) {
                            return Html::button('<i class="glyphicon glyphicon-remove-circle"></i> Revoke', [
                                'type' => 'button',
                                'title' => 'Xóa quyền',
                                'class' => 'btn btn-danger',
                                'onclick' => "revokeItemSP('$model1->name');"
                            ]);
                        },
                    ],
                ],
            ],
        ]); ?>

        <h3 class="form-section">Thêm nhóm quyền SP</h3>
        <?php
            $form = ActiveForm::begin([
                'id' => $formID,
                'action' => ['user/add-auth-item', 'id' => $model->id]
            ]);
        ?>

        <div class="form-group">
            <?php
                $roles = ArrayHelper::map($model->getMissingRoles(AuthItem::ACC_TYPE_SP), "name", "name");
                //                                            $data = ["Nhóm quyền" => $roles];
                $data = $roles;
                echo Select2::widget([
                    'name' => 'addItems',
                    'data' => $data,
                    'options' => [
                        'placeholder' => 'Chọn nhóm quyền ...',
                        'multiple' => true
                    ],
                ]);
            ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Thêm quyền',['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

