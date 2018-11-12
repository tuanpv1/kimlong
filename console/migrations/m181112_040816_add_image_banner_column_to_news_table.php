<?php

use yii\db\Migration;

/**
 * Handles adding image_banner to table `news`.
 */
class m181112_040816_add_image_banner_column_to_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('news', 'image_banner', $this->string());
        $this->addColumn('news', 'hot', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('news', 'image_banner');
        $this->dropColumn('news', 'hot');
    }
}
