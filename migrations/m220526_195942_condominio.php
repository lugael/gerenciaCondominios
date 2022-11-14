<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m220526_195942_condominio
 */
class m220526_195942_condominio extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ac_condominio',[
            'id' => Schema::TYPE_PK,
            'nomeCond' => Schema::TYPE_STRING . ' NOT NULL',
            'qtdBloco' => Schema::TYPE_INTEGER .' NOT NULL',
            'cep' => $this->string(8) . ' NOT NULL',
            'logradouro' => Schema::TYPE_STRING . ' NOT NULL',
            'numero' => Schema::TYPE_INTEGER . ' NOT NULL',
            'bairro' => Schema::TYPE_STRING . ' NOT NULL',
            'cidade' => $this->string(100) . ' NOT NULL',
            'estado' => $this->string(4)->notNull(),
            'dataCadastro' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
            'from_adm' => Schema::TYPE_INTEGER,
            'from_sindico' => Schema::TYPE_INTEGER,
        ]);
        $this->addForeignKey('fromSindico', 'ac_condominio', 'from_adm', 'ac_administradora', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        
        $this->dropTable('ac_condominio');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220526_195942_condominio cannot be reverted.\n";

        return false;
    }
    */
}
