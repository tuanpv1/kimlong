<?php

use yii\db\Migration;

/**
 * Handles adding map to table `news`.
 */
class m181113_184510_add_map_column_to_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('news', 'map', $this->string());
        $this->addColumn('news', 'video', $this->string());
        $this->addColumn('news', 'phone', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('news', 'map');
        $this->dropColumn('news', 'video');
        $this->dropColumn('news', 'phone');
    }
}
