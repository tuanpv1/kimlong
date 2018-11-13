<?php

use common\models\News;
use dosamigos\ckeditor\CKEditor;
use kartik\form\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */

$images = !$model->isNewRecord && !empty($model->image_display);
$imagesBanner = !$model->isNewRecord && !empty($model->image_banner);

$urlUploadImage = \yii\helpers\Url::to(['/app/upload']);
?>

<div class="form-body">

    <?php $form = ActiveForm::begin(
        [
            'options' => ['enctype' => 'multipart/form-data'],
            'method' => 'post',
        ]
    ); ?>
    <?php if($type == News::TYPE_NEWS || $type == News::TYPE_ABOUT || $type == News::TYPE_STAFF){ ?>

        <?= $form->field($model, 'type')->hiddenInput(['id' => 'type'])->label(false) ?>

        <?= $form->field($model, 'display_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'image_display')->widget(\kartik\file\FileInput::classname(), [
            'pluginOptions' => [

                'showCaption' => false,
                'showRemove' => false,
                'showUpload' => false,
                'browseClass' => 'btn btn-primary btn-block',
                'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                'browseLabel' => 'Chọn hình ảnh',
                'initialPreview' => $images ? [
                    Html::img(Yii::getAlias('@web') . '/' . Yii::getAlias('@image_news') . "/" . $model->image_display, ['class' => 'file-preview-image', 'style' => 'width: 100%;']),

                ] : [],
            ],
            'options' => [
                'accept' => 'image/*',
            ],
        ]);
        ?>

        <?php if($type == News::TYPE_NEWS){ ?>
            <?= $form->field($model, 'image_banner')->widget(\kartik\file\FileInput::classname(), [
                'pluginOptions' => [

                    'showCaption' => false,
                    'showRemove' => false,
                    'showUpload' => false,
                    'browseClass' => 'btn btn-primary btn-block',
                    'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                    'browseLabel' => 'Chọn hình ảnh',
                    'initialPreview' => $imagesBanner ? [
                        Html::img(Yii::getAlias('@web') . '/' . Yii::getAlias('@image_news') . "/" . $model->image_banner, ['class' => 'file-preview-image', 'style' => 'width: 100%;']),

                    ] : [],
                ],
                'options' => [
                    'accept' => 'image/*',
                ],
            ]);
            ?>
        <?php } ?>

        <?= $form->field($model, 'status')->dropDownList(\common\models\News::listStatus()) ?>

        <?= $form->field($model, 'short_description')->textarea(['rows' => 4]) ?>

        <?php if($type != News::TYPE_STAFF){ ?>
            <?= $form->field($model, 'content')->widget(CKEditor::className(), [
                'preset' => 'custom',
                'clientOptions' => [
                    'filebrowserUploadUrl' => $urlUploadImage
                ],
            ]); ?>
        <?php }else{ ?>
            <?= $form->field($model, 'phone')->textInput() ?>
        <?php } ?>
    <?php } elseif ($type == News::TYPE_PRODUCT) {
        ?>
        <ul class="nav nav-tabs nav-justified">
            <li class="active">
                <a href="#tab_detail" data-toggle="tab"><?= \Yii::t('app', 'Thông tin'); ?></a>
            </li>
            <li>
                <a href="#tab_description" data-toggle="tab"><?= \Yii::t('app', 'Tổng quan'); ?></a>
            </li>
            <li>
                <a href="#tab_images" data-toggle="tab"><?= \Yii::t('app', 'Hình ảnh'); ?></a>
            </li>
            <li>
                <a href="#tab_position" data-toggle="tab"><?= \Yii::t('app', 'Vị trí'); ?></a>
            </li>
            <li>
                <a href="#tab_design" data-toggle="tab"><?= \Yii::t('app', 'Thiết kế'); ?></a>
            </li>
            <li>
                <a href="#tab_legal" data-toggle="tab"><?= \Yii::t('app', 'Pháp lý'); ?></a>
            </li>
            <li>
                <a href="#tab_utilities" data-toggle="tab"><?= \Yii::t('app', 'Tiện ích'); ?></a>
            </li>
        </ul>
        <div class="tab-content">

            <div class="tab-pane active" id="tab_detail">
                <?= $form->field($model, 'type')->hiddenInput(['id' => 'type'])->label(false) ?>

                <?= $form->field($model, 'display_name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'hot')->checkbox()->hint('Sẽ hiển thị dự án này trên trang chủ') ?>

                <?= $form->field($model, 'status')->dropDownList(\common\models\News::listStatus()) ?>

                <?= $form->field($model, 'short_description')->textarea(['rows' => 4]) ?>

                <?= $form->field($model, 'map')->textarea(['rows' => 4]) ?>

                <?= $form->field($model, 'video')->textInput() ?>

                <?= $form->field($model, 'own')->textarea(['rows' => 4]) ?>
            </div>

            <div class="tab-pane" id="tab_description">
                <?= $form->field($model, 'content')->widget(CKEditor::className(), [
                    'preset' => 'custom',
                    'clientOptions' => [
                        'filebrowserUploadUrl' => $urlUploadImage
                    ],
                ]); ?>
            </div>

            <div class="tab-pane" id="tab_images">
                <?= $form->field($model, 'image_display')->widget(\kartik\file\FileInput::classname(), [
                    'pluginOptions' => [

                        'showCaption' => false,
                        'showRemove' => false,
                        'showUpload' => false,
                        'browseClass' => 'btn btn-primary btn-block',
                        'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                        'browseLabel' => 'Chọn hình ảnh',
                        'initialPreview' => $images ? [
                            Html::img(Yii::getAlias('@web') . '/' . Yii::getAlias('@image_news') . "/" . $model->image_display, ['class' => 'file-preview-image', 'style' => 'width: 100%;']),

                        ] : [],
                    ],
                    'options' => [
                        'accept' => 'image/*',
                    ],
                ]);
                ?>


                <?= $form->field($model, 'image_banner')->widget(\kartik\file\FileInput::classname(), [
                    'pluginOptions' => [

                        'showCaption' => false,
                        'showRemove' => false,
                        'showUpload' => false,
                        'browseClass' => 'btn btn-primary btn-block',
                        'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                        'browseLabel' => 'Chọn hình ảnh',
                        'initialPreview' => $images ? [
                            Html::img(Yii::getAlias('@web') . '/' . Yii::getAlias('@image_news') . "/" . $model->image_banner, ['class' => 'file-preview-image', 'style' => 'width: 100%;']),

                        ] : [],
                    ],
                    'options' => [
                        'accept' => 'image/*',
                    ],
                ]);
                ?>
            </div>

            <div class="tab-pane" id="tab_position">
                <?= $form->field($model, 'position')->widget(CKEditor::className(), [
                    'preset' => 'custom',
                    'clientOptions' => [
                        'filebrowserUploadUrl' => $urlUploadImage
                    ],
                ]); ?>
            </div>

            <div class="tab-pane" id="tab_design">
                <?= $form->field($model, 'design')->widget(CKEditor::className(), [
                    'preset' => 'custom',
                    'clientOptions' => [
                        'filebrowserUploadUrl' => $urlUploadImage
                    ],
                ]); ?>
            </div>

            <div class="tab-pane" id="tab_legal">
                <?= $form->field($model, 'legal')->widget(CKEditor::className(), [
                    'preset' => 'custom',
                    'clientOptions' => [
                        'filebrowserUploadUrl' => $urlUploadImage
                    ],
                ]); ?>
            </div>

            <div class="tab-pane" id="tab_utilities">
                <?= $form->field($model, 'utilities')->widget(CKEditor::className(), [
                    'preset' => 'custom',
                    'clientOptions' => [
                        'filebrowserUploadUrl' => $urlUploadImage
                    ],
                ]); ?>
            </div>

        </div>

    <?php } else { ?>
        <?= $form->field($model, 'content')->widget(CKEditor::className(), [
            'preset' => 'custom',
            'clientOptions' => [
                'filebrowserUploadUrl' => $urlUploadImage
            ],
        ]); ?>
    <?php } ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Tạo mới') : Yii::t('app', 'Cập nhật'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
