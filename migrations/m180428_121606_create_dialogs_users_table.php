<?php

use yii\db\Migration;

/**
 * Handles the creation of table `dialogs_users`.
 */
class m180428_121606_create_dialogs_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('dialogs_users', [
            'id' => $this->primaryKey(),
            'dialog_id' => $this->integer(),
            'user_id' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('dialogs_users');
    }
}
