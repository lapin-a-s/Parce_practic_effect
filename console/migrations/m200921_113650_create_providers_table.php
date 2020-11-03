<?php

use yii\db\Migration;

/**
 * Handles the creation of table `providers`.
 */
class m200921_113650_create_providers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'php') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('providers', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'COUNT' => $this->integer()->unique(),
            'STORE_COUNT' => $this->integer()->unique(),
            'ERRORS' => $this->integer()->unique(),
            'WARNINGS' => $this->integer()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('providers');
    }
}
