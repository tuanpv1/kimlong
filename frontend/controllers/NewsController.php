<?php

namespace frontend\controllers;

use common\models\News;
use common\models\Slide;
use yii\data\Pagination;
use yii\db\Expression;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class NewsController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        $newsQuery = News::find()
            ->andWhere(['status' => News::STATUS_ACTIVE])
            ->andWhere(['type' => News::TYPE_NEWS])
            ->orderBy(['updated_at' => SORT_DESC]);
        $countQuery = clone $newsQuery;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $news = $newsQuery->offset($pages->offset)
            ->limit(12)->all();

        return $this->render('index', [
            'news' => $news,
            'pages' => $pages,
        ]);
    }

    public function actionProjects()
    {
        $newsQuery = News::find()
            ->andWhere(['status' => News::STATUS_ACTIVE])
            ->andWhere(['type' => News::TYPE_PRODUCT])
            ->orderBy(['updated_at' => SORT_DESC]);
        $countQuery = clone $newsQuery;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $news = $newsQuery->offset($pages->offset)
            ->limit(12)->all();

        $banner = Slide::find()
            ->andWhere(['status' => Slide::STATUS_ACTIVE])
            ->all();

        return $this->render('projects', [
            'news' => $news,
            'pages' => $pages,
            'banner' => $banner,
        ]);
    }

    public function actionDetail($id)
    {
        $new = News::findOne(['id' => $id, 'status' => News::STATUS_ACTIVE]);
        if (!$new) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        // Lấy tin tức liên quan
        $relatedNews = News::find()
            ->andWhere(['status' => News::STATUS_ACTIVE])
            ->andWhere(['type' => News::TYPE_NEWS])
            ->andWhere(['<>', 'id', $id])
            ->orderBy(['updated_at' => SORT_DESC])
            ->limit(6)
            ->all();
        return $this->render('detail', [
            'new' => $new,
            'relatedNews' => $relatedNews
        ]);
    }

    public function actionProjectDetail($id)
    {
        $new = News::findOne(['id' => $id, 'status' => News::STATUS_ACTIVE]);
        if (!$new) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $relatedNews = News::find()
            ->andWhere(['status' => News::STATUS_ACTIVE])
            ->andWhere(['type' => News::TYPE_PRODUCT])
            ->andWhere(['<>', 'id', $id])
            ->orderBy(new Expression('rand()'))
            ->limit(6)
            ->all();
        return $this->render('project-detail', [
            'new' => $new,
            'relatedNews' => $relatedNews
        ]);
    }

    public function actionSearch()
    {
        if (!empty($_POST['keyword'])) {
            $newsQuery = News::find()
                ->andWhere(['status' => News::STATUS_ACTIVE])
                ->andWhere(['IN', 'type', [News::TYPE_PRODUCT, News::TYPE_NEWS]])
                ->andWhere(['like', 'display_name', $_POST['keyword']])
                ->orderBy(['updated_at' => SORT_DESC]);
            $countQuery = clone $newsQuery;
            $pages = new Pagination(['totalCount' => $countQuery->count()]);
            $news = $newsQuery->offset($pages->offset)
                ->limit(12)->all();

            $banner = Slide::find()
                ->andWhere(['status' => News::STATUS_ACTIVE])
                ->all();

            return $this->render('content-search', [
                'news' => $news,
                'banner' => $banner,
                'pages' => $pages,
                'keyword' => $_POST['keyword']
            ]);
        } else {
            return $this->redirect(['site/index']);
        }
    }
}