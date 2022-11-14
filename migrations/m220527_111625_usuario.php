<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m220527_111625_usuario
 */
class m220527_111625_usuario extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ac_usuarios',[
            'id' => Schema::TYPE_PK,
            'nomeUser' => Schema::TYPE_STRING . ' NOT NULL',
            'usuario' => $this->string(50) . ' NOT NULL',
            'senha' => $this->string(50) . ' NOT NULL',
            'dataCadastro' => Schema::TYPE_TIMESTAMP,
            'nivel' => Schema::TYPE_INTEGER,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('ac_usuarios');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220527_111625_usuario cannot be reverted.\n";

        return false;
    }
    */
}
