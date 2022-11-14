<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m220527_120949_conselho
 */
class m220527_120949_conselho extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ac_conselho', [
            'id' => Schema::TYPE_PK,
            'nomeCons' => Schema::TYPE_STRING . ' NOT NULL',
            'funcao' => "ENUM('Sindico','Subsindico','Conselheiro')",
            'dataCadastro' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
            'from_condominio' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);

        $this->addForeignKey('consFromCond' ,'ac_conselho','from_condominio', 'ac_condominio', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropForeignKey('consFromCond', 'ac_conselho');
       $this->dropTable('ac_conselho');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220527_120949_conselho cannot be reverted.\n";

        return false;
    }
    */
}
