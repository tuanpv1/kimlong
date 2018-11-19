<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Url;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $display_name
 * @property string $short_description
 * @property string $description
 * @property string $address
 * @property string $position
 * @property string $utilities
 * @property string $design
 * @property string $legal
 * @property string $own
 * @property string $image_display
 * @property string $image_banner
 * @property string $content
 * @property string $map
 * @property string $video
 * @property string $phone
 * @property int $type
 * @property int $hot
 * @property int $created_at
 * @property int $status
 * @property int $updated_at
 * @property int $created_user_id
 */
class News extends \yii\db\ActiveRecord
{
    const TYPE_NEWS = 2;
    const TYPE_ABOUT = 3;
    const TYPE_CONTACT = 4;
    const TYPE_PRODUCT = 5;
    const TYPE_STAFF = 6;

    const STATUS_NEW = 1;
    const STATUS_ACTIVE = 10;
    const STATUS_INACTIVE = 0;
    const STATUS_DELETED = 2;

    const IS_SLIDE = 1;
    const IS_HOT = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'image_display', 'image_banner', 'content', 'own', 'legal', 'design', 'utilities', 'position', 'address'], 'string'],
            [['type', 'created_at', 'status', 'updated_at', 'created_user_id', 'hot'], 'integer'],
            [['display_name', 'short_description'], 'string', 'max' => 500],
            [['short_description', 'display_name', 'content'], 'required', 'message' => Yii::t('app', '{attribute} không được để trống')],
            ['image_display', 'required', 'on' => 'create'],
            [['image_display','image_banner'],
                'file',
                'tooBig' => Yii::t('app', '{attribute} vượt quá dung lượng cho phép. Vui lòng thử lại'),
                'wrongExtension' => Yii::t('app', '{attribute} không đúng định dạng'),
                'uploadRequired' => Yii::t('app', '{attribute} không được để trống'),
                'extensions' => 'png, jpg, jpeg, gif',
                'maxSize' => 1024 * 1024 * 10
            ],
            [['map','string','phone','video'],'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'display_name' => Yii::t('app', 'Tên hiển thị'),
            'short_description' => Yii::t('app', 'Mô tả ngắn'),
            'image_display' => Yii::t('app', 'Hình ảnh đại diện'),
            'content' => Yii::t('app', 'Nội dung'),
            'type' => Yii::t('app', 'Loại'),
            'created_at' => Yii::t('app', 'Ngày tạo'),
            'status' => Yii::t('app', 'Trạng thái'),
            'updated_at' => Yii::t('app', 'Ngày thay đổi thông tin'),
            'created_user_id' => Yii::t('app', 'Người tạo'),
            'address' => Yii::t('app', 'Địa chỉ'),
            'position' => Yii::t('app', 'Vị trí'),
            'utilities' => Yii::t('app', 'Tiện ích'),
            'design' => Yii::t('app', 'Thiết kế'),
            'legal' => Yii::t('app', 'Pháp lý'),
            'own' => Yii::t('app', 'Chủ đầu tư'),
            'image_banner' => Yii::t('app', 'Hình ảnh slide'),
            'map' => Yii::t('app', 'Bản đồ'),
            'phone' => Yii::t('app', 'Điện thoại'),
            'video' => Yii::t('app', 'Video'),
        ];
    }

    public static function listStatus()
    {
        $lst = [
            self::STATUS_NEW => Yii::t('app', 'Soạn thảo'),
            self::STATUS_ACTIVE => Yii::t('app', 'Hoạt động'),
            self::STATUS_INACTIVE => Yii::t('app', 'Tạm dừng'),
        ];
        return $lst;
    }

    /**
     * @return array
     */

    /**
     * @return int
     */
    public function getStatusName()
    {
        $lst = self::listStatus();
        if (array_key_exists($this->status, $lst)) {
            return $lst[$this->status];
        }
        return $this->status;
    }

    public static function listStatusType()
    {
        $lst = [
            self::TYPE_NEWS => Yii::t('app', 'Tin tức'),
            self::TYPE_CONTACT => Yii::t('app', 'Thông tin liên hệ'),
            self::TYPE_ABOUT => Yii::t('app', 'Giới thiệu'),
            self::TYPE_PRODUCT => Yii::t('app', 'Dự án'),
            self::TYPE_STAFF => Yii::t('app', 'Chuyên viên tư vấn')
        ];
        return $lst;
    }

    public static function getTypeName($type)
    {
        $lst = self::listStatusType();
        if (array_key_exists($type, $lst)) {
            return $lst[$type];
        }
        return $type;
    }

    public function getImageDisplayLink()
    {
        $pathLink = Yii::getAlias('@web') . '/' . Yii::getAlias('@image_news') . '/';
        $filename = null;

        if ($this->image_display) {
            $filename = $this->image_display;

        }
        if ($filename == null) {
            $pathLink = Yii::getAlias("@web/img/");
            $filename = 'bg_df.png';
        }
        $link = Url::to($pathLink . $filename, true);
        if(strpos($link,'/admin/') === false){
            $link = str_replace('/staticdata/', '/admin/staticdata/', $link);
        }
        return $link;
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
            ],
        ];
    }

    public function getUserCreated()
    {
        $user = User::findOne($this->created_user_id);
        if (!$user) {
            return 'Đang cập nhật';
        }
        return $user->username;
    }

    public function beforeValidate()
    {
        foreach (array_keys($this->getAttributes()) as $attr) {
            if (!empty($this->$attr)) {
                $this->$attr = \yii\helpers\HtmlPurifier::process($this->$attr);
            }
        }
        return parent::beforeValidate();// to keep parent validator available
    }
}
