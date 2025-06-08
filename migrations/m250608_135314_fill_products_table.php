<?php

use yii\db\Migration;

class m250608_135314_fill_products_table extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            '{{%product}}', [
                'id' => $this->primaryKey(),
                'code' => $this->string()->notNull()->unique(),
                'description' => $this->string(),
            ],
            'ENGINE=InnoDB'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
