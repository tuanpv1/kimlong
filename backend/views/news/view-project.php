<?php

use common\models\News;
use kartik\detail\DetailView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = $model->display_name ? $model->display_name : News::getTypeName($model->type);
$this->params['breadcrumbs'][] = ['label' => News::getTypeName($model->type), 'url' => ['index', 'type' => $model->type]];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs font-green-sharp"></i>
                    <span class="caption-subject font-green-sharp bold uppercase"><?= $this->title ?></span>
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse">
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <p>
                    <?= Html::a('Cập nhật', ['update', 'id' => $model->id, 'type' => $model->type], ['class' => 'btn btn-primary']) ?>
                    <?php if ($model->type != News::TYPE_ABOUT && $model->type != News::TYPE_CONTACT) { ?>
                        <?= Html::a('Xóa', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Bạn chắc chắn muốn xóa ' . $model->display_name . '?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    <?php } ?>
                </p>
                <div class="tabbable-custom nav-justified">
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
                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    [
                                        'attribute' => 'display_name',
                                    ],
                                    [
                                        'attribute' => 'status',
                                        'value' => $model->getStatusName(),
                                    ],
                                    [
                                        'attribute' => 'short_description',
                                        'format' => 'html',
                                        'value' => $model->short_description
                                    ],
                                    [
                                        'attribute' => 'created_at',
                                        'value' => date('d/m/Y H:i:s', $model->created_at),
                                    ],
                                    [
                                        'attribute' => 'updated_at',
                                        'value' => date('d/m/Y H:i:s', $model->updated_at),
                                    ],
                                ],
                            ]) ?>
                        </div>

                        <div class="tab-pane" id="tab_description">
                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    [
                                        'attribute' => 'short_description',
                                        'format' => 'html',
                                        'label' => false,
                                        'value' => $model->content
                                    ],
                                ],
                            ]) ?>
                        </div>

                        <div class="tab-pane" id="tab_images">
                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    [
                                        'attribute' => 'image_display',
                                        'format' => 'html',
                                        'value' => Html::img(Yii::getAlias('@web') . "/" . Yii::getAlias('@image_news') . "/" . $model->image_display, ['height' => '200px']),
                                    ],
                                    [
                                        'attribute' => 'image_banner',
                                        'format' => 'html',
                                        'value' => Html::img(Yii::getAlias('@web') . "/" . Yii::getAlias('@image_news') . "/" . $model->image_banner, ['height' => '200px']),
                                    ],
                                ],
                            ]) ?>
                        </div>

                        <div class="tab-pane" id="tab_position">
                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    [
                                        'attribute' => 'position',
                                        'label' => false,
                                        'format' => 'html',
                                        'value' => $model->position
                                    ],
                                ],
                            ]) ?>
                        </div>

                        <div class="tab-pane" id="tab_design">
                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    [
                                        'attribute' => 'design',
                                        'label' => false,
                                        'format' => 'html',
                                        'value' => $model->design
                                    ],
                                ],
                            ]) ?>
                        </div>

                        <div class="tab-pane" id="tab_legal">
                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    [
                                        'attribute' => 'position',
                                        'format' => 'html',
                                        'label' => false,
                                        'value' => $model->legal
                                    ],
                                ],
                            ]) ?>
                        </div>

                        <div class="tab-pane" id="tab_utilities">
                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    [
                                        'attribute' => 'position',
                                        'format' => 'html',
                                        'label' => false,
                                        'value' => $model->utilities
                                    ],
                                ],
                            ]) ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

