<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m220527_114652_unidade
 */
class m220527_114652_unidade extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ac_unidade',[
            'id' => Schema::TYPE_PK,
            'numero' => Schema::TYPE_INTEGER . ' NOT NULL',
            'metragem' => Schema::TYPE_FLOAT . ' NOT NULL',
            'qtdVagas' => Schema::TYPE_INTEGER . ' NOT NULL',
            'dataCadastro' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
            'from_bloco' => Schema::TYPE_INTEGER . ' NOT NULL',
            'from_condominio' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);
        $this->addForeignKey('unidFromBloco', 'ac_unidade', 'from_bloco', 'ac_bloco', 'id');
        $this->addForeignKey('unidFromCondominio', 'ac_unidade', 'from_condominio', 'ac_condominio', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('unidFromBloco', 'ac_unidade');
        $this->dropForeignKey('unidFromCondominio', 'ac_unidade');
        $this->dropTable('ac_unidade');
    }
    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220527_114652_unidade cannot be reverted.\n";

        return false;
    }
    */
}
