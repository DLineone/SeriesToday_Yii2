<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%actor}}`.
 */
class m240117_214300_create_actor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%actor}}', [
            'id' => $this->primaryKey(),
            'full_name' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%actor}}');
    }
}
