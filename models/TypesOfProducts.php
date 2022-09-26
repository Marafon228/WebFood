<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "TypesOfProducts".
 *
 * @property int $Id
 * @property int $IdProduct
 * @property int $IdEnterprise
 *
 * @property Enterprise $idEnterprise
 * @property Product $idProduct
 */
class TypesOfProducts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TypesOfProducts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdProduct', 'IdEnterprise'], 'required'],
            [['IdProduct', 'IdEnterprise'], 'integer'],
            [['IdEnterprise'], 'exist', 'skipOnError' => true, 'targetClass' => Enterprise::class, 'targetAttribute' => ['IdEnterprise' => 'Id']],
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
            'IdProduct' => 'Id Product',
            'IdEnterprise' => 'Id Enterprise',
        ];
    }

    /**
     * Gets query for [[IdEnterprise]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdEnterprise()
    {
        return $this->hasOne(Enterprise::class, ['Id' => 'IdEnterprise']);
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
