<?php
/**
 * Created by PhpStorm.
 * User: TuanPham
 * Date: 11/19/2016
 * Time: 9:09 PM
 */
namespace frontend\widgets;

use common\models\Category;
use common\models\ProgramSuppost;
use yii\base\Widget;
use Yii;

class LatestDeals extends Widget{

    public $message;

    public  function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    public  function run()
    {
        $sp = ProgramSuppost::find()
            ->andWhere(['status' => Category::STATUS_ACTIVE])
            ->limit(4)
            ->all();
        return $this->render('latest-deals',[
            'sp'=>$sp
        ]);
    }
}