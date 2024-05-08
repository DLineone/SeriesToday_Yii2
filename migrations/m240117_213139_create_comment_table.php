<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%post}}`
 * - `{{%user}}`
 */
class m240117_213139_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'text' => $this->text(),
            'post_id' => $this->integer(),
            'author_id' => $this->integer(),
            'date_created' => $this->dateTime(),
            'date' => $this->date(),
        ]);

        // creates index for column `post_id`
        $this->createIndex(
            '{{%idx-comment-post_id}}',
            '{{%comment}}',
            'post_id'
        );

        // add foreign key for table `{{%post}}`
        $this->addForeignKey(
            '{{%fk-comment-post_id}}',
            '{{%comment}}',
            'post_id',
            '{{%post}}',
            'id',
            'CASCADE'
        );

        // creates index for column `author_id`
        $this->createIndex(
            '{{%idx-comment-author_id}}',
            '{{%comment}}',
            'author_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-comment-author_id}}',
            '{{%comment}}',
            'author_id',
            '{{%user}}',
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
            '{{%fk-comment-post_id}}',
            '{{%comment}}'
        );

        // drops index for column `post_id`
        $this->dropIndex(
            '{{%idx-comment-post_id}}',
            '{{%comment}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-comment-author_id}}',
            '{{%comment}}'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            '{{%idx-comment-author_id}}',
            '{{%comment}}'
        );

        $this->dropTable('{{%comment}}');
    }
}
