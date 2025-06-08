<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $code
 * @property string $description
 *
 * @property PurchasedProducts[] $purchasedProducts
 */
class Products extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'description'], 'required'],
            [['code'], 'string', 'max' => 10],
            [['description'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Код продукта',
            'description' => 'Описание',
        ];
    }

    /**
     * Gets query for [[PurchasedProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPurchasedProducts()
    {
        return $this->hasMany(PurchasedProducts::class, ['product_code' => 'code']);
    }
}

