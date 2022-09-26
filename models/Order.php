<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Order".
 *
 * @property int $Id
 * @property string $Name
 * @property string|null $Description
 * @property string $Date
 * @property int $IdUser
 * @property int|null $IdStatus
 * @property float|null $OverPrice
 * @property int|null $Count
 *
 * @property Status $idStatus
 * @property User $idUser
 * @property OrderAndProduct[] $orderAndProducts
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'Date', 'IdUser'], 'required'],
            [['Description'], 'string'],
            [['Date'], 'safe'],
            [['IdUser', 'IdStatus', 'Count'], 'integer'],
            [['OverPrice'], 'number'],
            [['Name'], 'string', 'max' => 50],
            [['IdStatus'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['IdStatus' => 'Id']],
            [['IdUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['IdUser' => 'Id']],
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
            'Date' => 'Date',
            'IdUser' => 'Id User',
            'IdStatus' => 'Id Status',
            'OverPrice' => 'Over Price',
            'Count' => 'Count',
        ];
    }

    /**
     * Gets query for [[IdStatus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdStatus()
    {
        return $this->hasOne(Status::class, ['Id' => 'IdStatus']);
    }

    /**
     * Gets query for [[IdUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::class, ['Id' => 'IdUser']);
    }

    /**
     * Gets query for [[OrderAndProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderAndProducts()
    {
        return $this->hasMany(OrderAndProduct::class, ['IdOrder' => 'Id']);
    }
}
