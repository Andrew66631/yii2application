<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book}}`.
 */
class m250608_150216_create_book_table extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            '{{%books}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
        ],
            'ENGINE=InnoDB'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%books}}');
    }
}
