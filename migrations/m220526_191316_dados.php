<?php

use yii\db\Migration;

/**
 * Class m220526_191316_dados
 */
class m220526_191316_dados extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('testee', [
            'titulo' => 'título 1',
            'conteudo' => 'conteúdo 1',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220526_191316_dados cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220526_191316_dados cannot be reverted.\n";

        return false;
    }
    */
}
