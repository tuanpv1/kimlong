<?php
/**
 * Created by PhpStorm.
 * User: TuanPham
 * Date: 11/19/2016
 * Time: 9:09 PM
 */
namespace frontend\widgets;

use common\models\Customer;
use yii\base\Widget;
use Yii;

class FormLogin extends Widget{

    public $message;

    public  function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    public  function run()
    {
        $model = new Customer();
        return $this->render('form-login',[
            'model' => $model,
        ]);
    }
}
