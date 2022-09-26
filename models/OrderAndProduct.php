<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "OrderAndProduct".
 *
 * @property int $Id
 * @property int $IdOrder
 * @property int $IdProduct
 *
 * @property Order $idOrder
 * @property Product $idProduct
 */
class OrderAndProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'OrderAndProduct';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdOrder', 'IdProduct'], 'required'],
            [['IdOrder', 'IdProduct'], 'integer'],
            [['IdOrder'], 'exist', 'skipOnError' => true, 'targetClass' => Order::class, 'targetAttribute' => ['IdOrder' => 'Id']],
            [['IdProduct'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['IdProduct' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'IdOrder' => 'Id Order',
            'IdProduct' => 'Id Product',
        ];
    }

    /**
     * Gets query for [[IdOrder]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdOrder()
    {
        return $this->hasOne(Order::class, ['Id' => 'IdOrder']);
    }

    /**
     * Gets query for [[IdProduct]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduct()
    {
        return $this->hasOne(Product::class, ['Id' => 'IdProduct']);
    }
}
