<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post_country}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%post}}`
 * - `{{%country}}`
 */
class m240117_214503_create_junction_table_for_post_and_country_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post_country}}', [
            'post_id' => $this->integer(),
            'country_id' => $this->integer(),
            'PRIMARY KEY(post_id, country_id)',
        ]);

        // creates index for column `post_id`
        $this->createIndex(
            '{{%idx-post_country-post_id}}',
            '{{%post_country}}',
            'post_id'
        );

        // add foreign key for table `{{%post}}`
        $this->addForeignKey(
            '{{%fk-post_country-post_id}}',
            '{{%post_country}}',
            'post_id',
            '{{%post}}',
            'id',
            'CASCADE'
        );

        // creates index for column `country_id`
        $this->createIndex(
            '{{%idx-post_country-country_id}}',
            '{{%post_country}}',
            'country_id'
        );

        // add foreign key for table `{{%country}}`
        $this->addForeignKey(
            '{{%fk-post_country-country_id}}',
            '{{%post_country}}',
            'country_id',
            '{{%country}}',
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
            '{{%fk-post_country-post_id}}',
            '{{%post_country}}'
        );

        // drops index for column `post_id`
        $this->dropIndex(
            '{{%idx-post_country-post_id}}',
            '{{%post_country}}'
        );

        // drops foreign key for table `{{%country}}`
        $this->dropForeignKey(
            '{{%fk-post_country-country_id}}',
            '{{%post_country}}'
        );

        // drops index for column `country_id`
        $this->dropIndex(
            '{{%idx-post_country-country_id}}',
            '{{%post_country}}'
        );

        $this->dropTable('{{%post_country}}');
    }
}
