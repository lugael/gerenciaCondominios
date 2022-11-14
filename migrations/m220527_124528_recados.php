<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m220527_124528_recados
 */
class m220527_124528_recados extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ac_recados',[
            'id' => Schema::TYPE_PK,
            'titulo' => Schema::TYPE_STRING . ' NOT NULL',
            'conteudo' => Schema::TYPE_TEXT . ' NOT NULL',
            'dtInicio' => Schema::TYPE_DATE . ' NOT NULL',
            'dtFim' => Schema::TYPE_DATE . ' NOT NULL',
            'from_condominio' => Schema::TYPE_INTEGER . ' NOT NULL',
            'from_bloco' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);
        $this->addForeignKey('recadoFromCond', 'ac_recados', 'from_condominio', 'ac_condominio', 'id');
        $this->addForeignKey('recadoFromBlçoco', 'ac_recados', 'from_bloco', 'ac_bloco', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('recadoFromCond', 'ac_recados');
        $this->dropForeignKey('recadoFromBloco', 'ac_recados');
        $this->dropTable('ac_recados');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220527_124528_recados cannot be reverted.\n";

        return false;
    }
    */
}
