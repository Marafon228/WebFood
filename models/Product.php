<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Product".
 *
 * @property int $Id
 * @property string $Name
 * @property string|null $Description
 * @property float $Price
 * @property resource|null $Image
 *
 * @property OrderAndProduct[] $orderAndProducts
 * @property TypesOfProducts[] $typesOfProducts
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'Price'], 'required'],
            [['Description', 'Image'], 'string'],
            [['Price'], 'number'],
            [['Name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Name' => 'Name',
            'Description' => 'Description',
            'Price' => 'Price',
            'Image' => 'Image',
        ];
    }

    /**
     * Gets query for [[OrderAndProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderAndProducts()
    {
        return $this->hasMany(OrderAndProduct::class, ['IdProduct' => 'Id']);
    }

    /**
     * Gets query for [[TypesOfProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTypesOfProducts()
    {
        return $this->hasMany(TypesOfProducts::class, ['IdProduct' => 'Id']);
    }
}
