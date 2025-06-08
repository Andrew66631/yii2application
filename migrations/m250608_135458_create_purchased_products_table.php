<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%purchased_products}}`.
 */
class m250608_135458_create_purchased_products_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%purchased_products}}', [
            'id' => $this->primaryKey(),
            'product_code' => $this->string()->notNull(),
            'user_id' => $this->integer()->notNull(),
        ]);



        $this->addForeignKey(
            'fk-purchased_products-product_code',
            'purchased_products',
            'product_code',
            'product',
            'code',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-purchased_products-user_id',
            'purchased_products',
            'user_id',
            'user',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-purchased_products-user_id', 'purchased_products');
        $this->dropForeignKey('fk-purchased_products-product_code', 'purchased_products');
        $this->dropTable('{{%purchased_products}}');
    }
}
