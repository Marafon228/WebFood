<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "TypeOfEnterprise".
 *
 * @property int $Id
 * @property string $Name
 *
 * @property Enterprise[] $enterprises
 */
class TypeOfEnterprise extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TypeOfEnterprise';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name'], 'required'],
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
        ];
    }

    /**
     * Gets query for [[Enterprises]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnterprises()
    {
        return $this->hasMany(Enterprise::class, ['IdType' => 'Id']);
    }
}
