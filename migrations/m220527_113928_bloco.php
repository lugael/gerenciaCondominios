<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m220527_113928_bloco
 */
class m220527_113928_bloco extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ac_bloco', [
            'id' => Schema::TYPE_PK,
            'nomeB' => $this->string(50) . ' NOT NULL',
            'andares' => Schema::TYPE_INTEGER . ' NOT NULL',
            'qtdUnid' => Schema::TYPE_INTEGER . ' NOT NULL',
            'dataCadastro' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
            'from_condominio' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);

        $this->addForeignKey('fromCondominio', 'ac_bloco' , 'from_condominio', 'ac_condominio', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {   
        $this->dropForeignKey('fromCondominio', 'ac_bloco');
        $this->dropTable('ac_bloco');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220527_113928_bloco cannot be reverted.\n";

        return false;
    }
    */
}
