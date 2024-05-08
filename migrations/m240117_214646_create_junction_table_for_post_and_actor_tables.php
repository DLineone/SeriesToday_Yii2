<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post_actor}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%post}}`
 * - `{{%actor}}`
 */
class m240117_214646_create_junction_table_for_post_and_actor_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post_actor}}', [
            'post_id' => $this->integer(),
            'actor_id' => $this->integer(),
            'PRIMARY KEY(post_id, actor_id)',
        ]);

        // creates index for column `post_id`
        $this->createIndex(
            '{{%idx-post_actor-post_id}}',
            '{{%post_actor}}',
            'post_id'
        );

        // add foreign key for table `{{%post}}`
        $this->addForeignKey(
            '{{%fk-post_actor-post_id}}',
            '{{%post_actor}}',
            'post_id',
            '{{%post}}',
            'id',
            'CASCADE'
        );

        // creates index for column `actor_id`
        $this->createIndex(
            '{{%idx-post_actor-actor_id}}',
            '{{%post_actor}}',
            'actor_id'
        );

        // add foreign key for table `{{%actor}}`
        $this->addForeignKey(
            '{{%fk-post_actor-actor_id}}',
            '{{%post_actor}}',
            'actor_id',
            '{{%actor}}',
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
            '{{%fk-post_actor-post_id}}',
            '{{%post_actor}}'
        );

        // drops index for column `post_id`
        $this->dropIndex(
            '{{%idx-post_actor-post_id}}',
            '{{%post_actor}}'
        );

        // drops foreign key for table `{{%actor}}`
        $this->dropForeignKey(
            '{{%fk-post_actor-actor_id}}',
            '{{%post_actor}}'
        );

        // drops index for column `actor_id`
        $this->dropIndex(
            '{{%idx-post_actor-actor_id}}',
            '{{%post_actor}}'
        );

        $this->dropTable('{{%post_actor}}');
    }
}
