<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post_director}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%post}}`
 * - `{{%director}}`
 */
class m240117_214634_create_junction_table_for_post_and_director_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post_director}}', [
            'post_id' => $this->integer(),
            'director_id' => $this->integer(),
            'PRIMARY KEY(post_id, director_id)',
        ]);

        // creates index for column `post_id`
        $this->createIndex(
            '{{%idx-post_director-post_id}}',
            '{{%post_director}}',
            'post_id'
        );

        // add foreign key for table `{{%post}}`
        $this->addForeignKey(
            '{{%fk-post_director-post_id}}',
            '{{%post_director}}',
            'post_id',
            '{{%post}}',
            'id',
            'CASCADE'
        );

        // creates index for column `director_id`
        $this->createIndex(
            '{{%idx-post_director-director_id}}',
            '{{%post_director}}',
            'director_id'
        );

        // add foreign key for table `{{%director}}`
        $this->addForeignKey(
            '{{%fk-post_director-director_id}}',
            '{{%post_director}}',
            'director_id',
            '{{%director}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%post}}`
        $this->dropForeignKey(
            '{{%fk-post_director-post_id}}',
            '{{%post_director}}'
        );

        // drops index for column `post_id`
        $this->dropIndex(
            '{{%idx-post_director-post_id}}',
            '{{%post_director}}'
        );

        // drops foreign key for table `{{%director}}`
        $this->dropForeignKey(
            '{{%fk-post_director-director_id}}',
            '{{%post_director}}'
        );

        // drops index for column `director_id`
        $this->dropIndex(
            '{{%idx-post_director-director_id}}',
            '{{%post_director}}'
        );

        $this->dropTable('{{%post_director}}');
    }
}
