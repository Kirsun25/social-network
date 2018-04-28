<?php

use yii\db\Migration;

/**
 * Handles the creation of table `messages`.
 */
class m180428_121622_create_messages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('messages', [
            'id' => $this->primaryKey(),
            'message' => $this->text(),
            'date' => $this->date(),
            'dialog_id' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('messages');
    }
}
