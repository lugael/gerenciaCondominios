<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m220526_181250_primeiraMigrate
 */
class m220526_181250_primeiraMigrate extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('testee',[
            'id' => Schema::TYPE_PK,
            'titulo' => Schema::TYPE_STRING . ' NOT NULL',
            'conteudo' => Schema::TYPE_TEXT,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('testee');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220526_181250_primeiraMigrate cannot be reverted.\n";

        return false;
    }
    */
}
