<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m180428_121633_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'login' => $this->string(),
            'pass' => $this->string(),
            'email' => $this->string(),
            'auth_key' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }
}
