<?php

use yii\db\Migration;

/**
 * Handles adding address to table `news`.
 */
class m181111_143426_add_address_column_to_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('news','address',$this->string());
        $this->addColumn('news','position',$this->text());
        $this->addColumn('news','utilities',$this->text());
        $this->addColumn('news','design',$this->text());
        $this->addColumn('news','legal',$this->text());
        $this->addColumn('news','own',$this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('news','address');
        $this->dropColumn('news','position');
        $this->dropColumn('news','utilities');
        $this->dropColumn('news','design');
        $this->dropColumn('news','legal');
        $this->dropColumn('news','own');
    }
}
