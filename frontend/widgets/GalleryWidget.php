<?php
/**
 * Created by PhpStorm.
 * User: TuanPV
 * Date: 11/12/2018
 * Time: 1:07 PM
 */

namespace frontend\widgets;


use common\models\News;
use yii\base\Widget;

class GalleryWidget extends Widget
{
    public $message;

    public  function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    public  function run()
    {
        $news = News::find()
            ->andWhere(['status' => News::STATUS_ACTIVE])
            ->andWhere(['type' => News::TYPE_PRODUCT])
            ->all();
        return $this->render('gallery-images',['news' => $news]);
    }
}