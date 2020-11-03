<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m200917_080018_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    (public function up()
{
    $tableOptions = null;
    if ($this->db->driverName === 'php') {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
    }
    $this->createTable('{{%user}}', [
        'id' => $this->primaryKey(),
        'username' => $this->string()->notNull()->unique(),
        'auth_key' => $this->string(32)->notNull(),
        'password_hash' => $this->string()->notNull(),
        'password_reset_token' => $this->string()->unique(),
        'created_at' => $this->integer()->notNull(),
        'updated_at' => $this->integer()->notNull(),
    ], $tableOptions);
}
    public function safeDown()
    {
        $this->dropTable('users');
    }


}
