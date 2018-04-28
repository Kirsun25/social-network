<?php

use yii\db\Migration;

/**
 * Handles the creation of table `dialogs`.
 */
class m180428_121534_create_dialogs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('dialogs', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('dialogs');
    }
}
