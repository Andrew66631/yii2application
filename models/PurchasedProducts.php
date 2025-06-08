<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "purchased_products".
 *
 * @property int $id
 * @property string $product_code
 * @property int $user_id
 *
 * @property Products $product
 * @property User $user
 */
class PurchasedProducts extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'purchased_products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_code', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            [['product_code'], 'string', 'max' => 10],
            [['product_code'], 'exist', 'skipOnError' => true, 'targetClass' => Products::class, 'targetAttribute' => ['product_code' => 'code']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_code' => 'Код продукта',
            'user_id' => 'ID пользователя',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::class, ['code' => 'product_code']);
    }

    /**
     * Gets query for [[User ]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser ()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
