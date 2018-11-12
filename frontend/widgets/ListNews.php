<?php
/**
 * Created by PhpStorm.
 * User: TuanPham
 * Date: 11/19/2016
 * Time: 9:09 PM
 */
namespace frontend\widgets;

use common\models\News;
use DateTime;
use yii\base\Widget;
use Yii;

class ListNews extends Widget{

    public $message;

    public  function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    public  function run()
    {
        $staffs = News::find()
            ->andWhere(['status' => News::STATUS_ACTIVE])
            ->andWhere(['type' => News::TYPE_STAFF])
            ->orderBy(['updated_at' => SORT_DESC])
            ->all();
        return $this->render('list-staff',[
            'staffs' => $staffs
        ]);
    }
}