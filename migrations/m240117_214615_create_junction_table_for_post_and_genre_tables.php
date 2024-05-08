<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post_genre}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%post}}`
 * - `{{%genre}}`
 */
class m240117_214615_create_junction_table_for_post_and_genre_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post_genre}}', [
            'post_id' => $this->integer(),
            'genre_id' => $this->integer(),
            'PRIMARY KEY(post_id, genre_id)',
        ]);

        // creates index for column `post_id`
        $this->createIndex(
            '{{%idx-post_genre-post_id}}',
            '{{%post_genre}}',
            'post_id'
        );

        // add foreign key for table `{{%post}}`
        $this->addForeignKey(
            '{{%fk-post_genre-post_id}}',
            '{{%post_genre}}',
            'post_id',
            '{{%post}}',
            'id',
            'CASCADE'
        );

        // creates index for column `genre_id`
        $this->createIndex(
            '{{%idx-post_genre-genre_id}}',
            '{{%post_genre}}',
            'genre_id'
        );

        // add foreign key for table `{{%genre}}`
        $this->addForeignKey(
            '{{%fk-post_genre-genre_id}}',
            '{{%post_genre}}',
            'genre_id',
            '{{%genre}}',
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
            '{{%fk-post_genre-post_id}}',
            '{{%post_genre}}'
        );

        // drops index for column `post_id`
        $this->dropIndex(
            '{{%idx-post_genre-post_id}}',
            '{{%post_genre}}'
        );

        // drops foreign key for table `{{%genre}}`
        $this->dropForeignKey(
            '{{%fk-post_genre-genre_id}}',
            '{{%post_genre}}'
        );

        // drops index for column `genre_id`
        $this->dropIndex(
            '{{%idx-post_genre-genre_id}}',
            '{{%post_genre}}'
        );

        $this->dropTable('{{%post_genre}}');
    }
}
