<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m220526_191431_administradora
 */
class m220526_191431_administradora extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ac_administradora',[
            'id' => Schema::TYPE_PK,
            'nomeAdm' => Schema::TYPE_STRING . ' NOT NULL',
            'dataCadastro' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
            'cnpj' => Schema::TYPE_STRING . ' NOT NULL',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('ac_administradora');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220526_191431_administradora cannot be reverted.\n";

        return false;
    }
    */
}
