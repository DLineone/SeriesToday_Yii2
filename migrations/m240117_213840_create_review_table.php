<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%review}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%post}}`
 * - `{{%user}}`
 */
class m240117_213840_create_review_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%review}}', [
            'id' => $this->primaryKey(),
            'text' => $this->text(),
            'post_id' => $this->integer(),
            'author_id' => $this->integer(),
            'date_created' => $this->dateTime(),
            'date' => $this->date(),
            'rating' => $this->integer(),
        ]);

        // creates index for column `post_id`
        $this->createIndex(
            '{{%idx-review-post_id}}',
            '{{%review}}',
            'post_id'
        );

        // add foreign key for table `{{%post}}`
        $this->addForeignKey(
            '{{%fk-review-post_id}}',
            '{{%review}}',
            'post_id',
            '{{%post}}',
            'id',
            'CASCADE'
        );

        // creates index for column `author_id`
        $this->createIndex(
            '{{%idx-review-author_id}}',
            '{{%review}}',
            'author_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-review-author_id}}',
            '{{%review}}',
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
            '{{%fk-review-post_id}}',
            '{{%review}}'
        );

        // drops index for column `post_id`
        $this->dropIndex(
            '{{%idx-review-post_id}}',
            '{{%review}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-review-author_id}}',
            '{{%review}}'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            '{{%idx-review-author_id}}',
            '{{%review}}'
        );

        $this->dropTable('{{%review}}');
    }
}
