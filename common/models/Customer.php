<?php

namespace common\models;
use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string $email
 * @property string $about
 */
class Customer extends \yii\db\ActiveRecord
{
    const STATUS_NEW = 1;
    const STATUS_CALLING = 2;
    const STATUS_CALLED = 3;


    public static function getListStatus()
    {
        $ls = [
            self::STATUS_NEW => Yii::t('app','Vừa đăng kí'),
            self::STATUS_CALLING => Yii::t('app',"Đang gọi tư vấn"),
            self::STATUS_CALLED => Yii::t('app',"Đã gọi")
        ];
        return $ls;
    }

    public function getStatusName()
    {
        $lst = self::getListStatus();
        if (array_key_exists($this->status, $lst)) {
            return $lst[$this->status];
        }
        return $this->status;
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'email', 'about'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'phone', 'email'], 'string', 'max' => 255],
            [['about'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Họ và tên',
            'phone' => 'Số điện thoại',
            'status' => 'Trạng thái',
            'created_at' => 'Ngày đăng kí',
            'updated_at' => 'Ngày cập nhật',
            'email' => 'Email',
            'about' => 'Nhu cầu',
        ];
    }

    public function beforeValidate()
    {
        foreach (array_keys($this->getAttributes()) as $attr){
            if(!empty($this->$attr)){
                $this->$attr = \yii\helpers\HtmlPurifier::process($this->$attr);
            }
        }
        return parent::beforeValidate();// to keep parent validator available
    }
}
