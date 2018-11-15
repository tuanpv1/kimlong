<?php
/**
 * Created by PhpStorm.
 * User: TuanPham
 * Date: 12/2/2016
 * Time: 9:10 AM
 */
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;

$js_toastr = <<<JS
$('#form-signup').submit(function () {
     var form = $(this);
     if (form.find('.has-error').length) 
     {
          return false;
     }
      $.ajax({
            url    : form.attr('action'),
            type   : 'post',
            data   : form.serialize(),
            success: function (response) 
            {
                if(response.success){
                    toastr.success(response.message);
                    $('#myModal').modal('hide');
                }else{
                    toastr.error(response.message);
                }
            },
            error  : function () 
            {
                toastr.error('Lỗi hệ thống');
            }
      });
      return false;
});
JS;
$this->registerJs($js_toastr, View::POS_READY);
?>

<!-- Start Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title text-center" id="myModalLabel">Nhận bảng giá mới nhất từ chủ đầu tư</h4>
            </div>
            <div class="modal-body">
                <div class="box-authentication tp_001">
                    <?php
                    $form = ActiveForm::begin([
                        'action' => Url::to(['site/customer']),
                        'id' => 'form-signup',
                        'enableAjaxValidation' => true,
                        'validationUrl' => Url::to(['site/validate-customer']),
                    ]);
                    ?>

                    <?= $form->field($model, 'name')->textInput(['required' => true]) ?>

                    <?= $form->field($model, 'phone')->textInput(['required' => true]) ?>

                    <?= $form->field($model, 'email')->textInput(['required' => true]) ?>

                    <?= $form->field($model, 'about')->textInput(['required' => true]) ?>

                    <div class="text-center">
                        <button name="signup-button" class="button"><i class="fa fa-user"></i> Đăng kí</button>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

