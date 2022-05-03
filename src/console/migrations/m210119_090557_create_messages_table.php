<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%messages}}`.
 * Has foreign keys to the tables:.
 *
 * - `{{%user}}`
 * - `{{%messages}}`
 */
class m210119_090557_create_messages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%messages}}', [
            'id' => $this->primaryKey(),
            'owner' => $this->integer(),
            'create_at' => $this->integer(),
            'update_at' => $this->integer(),
            'body' => $this->text(),
            'blocked' => $this->integer(),
            'reply' => $this->integer(),
        ]);

        // creates index for column `owner`
        $this->createIndex(
            '{{%idx-messages-owner}}',
            '{{%messages}}',
            'owner'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-messages-owner}}',
            '{{%messages}}',
            'owner',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `reply`
        $this->createIndex(
            '{{%idx-messages-reply}}',
            '{{%messages}}',
            'reply'
        );

        // add foreign key for table `{{%messages}}`
        $this->addForeignKey(
            '{{%fk-messages-reply}}',
            '{{%messages}}',
            'reply',
            '{{%messages}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-messages-owner}}',
            '{{%messages}}'
        );

        // drops index for column `owner`
        $this->dropIndex(
            '{{%idx-messages-owner}}',
            '{{%messages}}'
        );

        // drops foreign key for table `{{%messages}}`
        $this->dropForeignKey(
            '{{%fk-messages-reply}}',
            '{{%messages}}'
        );

        // drops index for column `reply`
        $this->dropIndex(
            '{{%idx-messages-reply}}',
            '{{%messages}}'
        );

        $this->dropTable('{{%messages}}');
    }
}
