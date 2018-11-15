<?php

namespace frontend\controllers;

use common\models\Customer;
use common\models\News;
use common\models\subscriber;
use Yii;
use yii\base\InvalidParamException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * Site controller
 */
class SiteController extends Controller
{

    public $successUrl = 'Success';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'successCallback'],
            ]
        ];
    }

    public function actionIndex()
    {
        $this->layout = 'main-home';
        return $this->render('index');
    }

    public function actionCustomer()
    {
        $model = new Customer();
        if ($model->load(Yii::$app->request->post())) {
            $model->status = Customer::STATUS_NEW;
            \Yii::$app->response->format = Response::FORMAT_JSON;
            if ($model->save()) {
                $message = Yii::t('app', 'Đăng kí thành công');
                return ['message' => $message, 'success' => true];
            } else {
                $message = Yii::t('app', 'Đăng kí không thành công, Vui lòng kiểm tra lại thông tin');
                Yii::error($model->getErrors());
                return [
                    'message' => $message,
                    'success' => false
                ];
            }
        }
    }

    public function actionValidateCustomer(){
        $model = new Customer();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }

    public function actionAbout()
    {
        $new = News::findOne(['type' => News::TYPE_ABOUT, 'status' => News::STATUS_ACTIVE]);
        if (!$new) {
            \Yii::$app->session->setFlash('error', Yii::t('app', 'Chưa cập nhật thông tin'));
            return $this->redirect(['site/index']);
        }
        return $this->render('detail', [
            'new' => $new,
        ]);
    }

    public function actionContact()
    {
        $new = News::findOne(['type' => News::TYPE_CONTACT, 'status' => News::STATUS_ACTIVE]);
        if (!$new) {
            \Yii::$app->session->setFlash('error', Yii::t('app', 'Chưa cập nhật thông tin'));
            return $this->redirect(['site/index']);
        }
        return $this->render('detail', [
            'new' => $new,
        ]);
    }
}
