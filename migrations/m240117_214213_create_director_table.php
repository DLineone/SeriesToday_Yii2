<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%director}}`.
 */
class m240117_214213_create_director_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%director}}', [
            'id' => $this->primaryKey(),
            'full_name' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%director}}');
    }
}
