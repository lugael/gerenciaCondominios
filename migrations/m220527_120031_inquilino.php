<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m220527_120031_inquilino
 */
class m220527_120031_inquilino extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ac_inquilino',[
            'id' => Schema::TYPE_PK,
            'nome' => Schema::TYPE_STRING . ' NOT NULL',
            'cpf' => $this->string(15) . ' NOT NULL',
            'email' => Schema::TYPE_STRING . ' NOT NULL',
            'telefone' => $this->string(50) . ' NOT NULL',
            'senha' => $this->string(50) . ' NOT  NULL',
            'datacadastro' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
            'dtnasc' => Schema::TYPE_DATE . ' NOT NULL',
            'from_condominio' => Schema::TYPE_INTEGER . ' NOT NULL',
            'from_bloco' => Schema::TYPE_INTEGER . ' NOT NULL',
            'from_unidade' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);
        $this->addForeignKey('inqFromCond', 'ac_inquilino', 'from_condominio', 'ac_condominio', 'id' );
        $this->addForeignKey('inqFromBloco', 'ac_inquilino', 'from_bloco', 'ac_bloco', 'id' );
        $this->addForeignKey('inqFromUnid', 'ac_inquilino', 'from_unidade', 'ac_unidade', 'id' );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('inqFromCond' , 'ac_inquilino');
        $this->dropForeignKey('inqFromBloco' , 'ac_inquilino');
        $this->dropForeignKey('inqFromUnid' , 'ac_inquilino');
        $this->dropTable('ac_inquilino');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220527_120031_inquilino cannot be reverted.\n";

        return false;
    }
    */
}
