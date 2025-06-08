<?php

use yii\db\Migration;

class m250608_141927_fill_purchased_products_table extends Migration
{
    public function safeUp()
    {
        $this->batchInsert('purchased_products', ['product_code', 'user_id'], [
            ['P001', 2],
            ['P002', 51],
            ['P003', 2],
            ['P004', 2],
            ['P005', 3],
            ['P006', 3],
            ['P007', 51],
            ['P008', 4],
            ['P009', 4],
            ['P010', 5],
            ['P011', 5],
            ['P012', 6],
            ['P013', 6],
            ['P014', 7],
            ['P015', 7],
            ['P016', 8],
            ['P017', 8],
            ['P018', 9],
            ['P019', 9],
            ['P020', 10],
            ['P021', 10],
            ['P022', 49],
            ['P023', 2],
            ['P024', 3],
            ['P025', 4],
            ['P026', 5],
            ['P027', 6],
            ['P028', 7],
            ['P029', 8],
            ['P030', 9],
            ['P031', 10],
            ['P032', 38],
            ['P033', 2],
            ['P034', 3],
            ['P035', 4],
            ['P036', 5],
            ['P037', 6],
            ['P038', 7],
            ['P039', 8],
            ['P040', 9],
            ['P041', 10],
            ['P042', 22],
            ['P043', 2],
            ['P044', 3],
            ['P045', 4],
            ['P046', 5],
            ['P047', 6],
            ['P048', 7],
            ['P049', 8],
            ['P050', 9],
        ]);
    }

    public function safeDown()
    {
        // Очищаем таблицу purchased_products
        $this->truncateTable('purchased_products');
    }
}
