<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "UsersAndEnterprise".
 *
 * @property int $Id
 * @property int|null $IdUser
 * @property int $IdEnterprise
 *
 * @property Enterprise $idEnterprise
 * @property User $idUser
 */
class UsersAndEnterprise extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'UsersAndEnterprise';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdUser', 'IdEnterprise'], 'integer'],
            [['IdEnterprise'], 'required'],
            [['IdEnterprise'], 'exist', 'skipOnError' => true, 'targetClass' => Enterprise::class, 'targetAttribute' => ['IdEnterprise' => 'Id']],
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
            'IdUser' => 'Id User',
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
     * Gets query for [[IdUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::class, ['Id' => 'IdUser']);
    }
}
