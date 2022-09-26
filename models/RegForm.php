<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "User".
 *
 * @property int $Id
 * @property string $Login
 * @property string $Password
 * @property string $FirsName
 * @property string $MidleName
 * @property string $LastName
 * @property string $Adress
 * @property string $Phone
 * @property string $Email
 * @property int $IdRole
 * @property string|null $Access_token
 * @property string|null $Auth_key
 *
 * @property Role $idRole
 * @property Order[] $orders
 * @property UsersAndEnterprise[] $usersAndEnterprises
 */
class RegForm extends User
{
    public $PasswordConfirm;
    public $Agree;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Login', 'Password', 'FirsName', 'MidleName', 'LastName', 'Adress', 'Phone', 'Email', 'IdRole','PasswordConfirm','Agree'], 'required', 'message'=>'Поле обязательно для заполнения'],
            [['FirsName', 'MidleName', 'LastName'], 'match', 'pattern' => '/^[А-Яа-я\s\-]{5,}$/u', 'message' => 'Только кирилица, пробелы и дефисы'],
            ['Login', 'match', 'pattern' => '/^[A-Za-z\s\-]{1,}$/u', 'message' => 'Только латинские буквы'],
            ['Login', 'unique', 'message' => 'Этот логин занят'],
            ['Email', 'email', 'message' => 'Некорректный Email адрес'],
            ['PasswordConfirm', 'compare', 'compareAttribute' => 'Password' , 'message' => 'Пароли должны совподать'],
            ['Agree', 'boolean'],
            ['Agree', 'compare', 'compareValue' => true, 'message' => 'Необходимо согласиться'],
            [['IdRole'], 'integer'],
            ['IdRole', 'default', 'value' => 4],
            [['Login', 'Password', 'FirsName', 'MidleName', 'LastName', 'Adress', 'Phone', 'Email', 'Access_token', 'Auth_key'], 'string', 'max' => 50],
            [['IdRole'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['IdRole' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Login' => 'Логин',
            'Password' => 'Пароль',
            'FirsName' => 'Фамилия',
            'MidleName' => 'Имя',
            'LastName' => 'Отчество',
            'Adress' => 'Адрес',
            'Phone' => 'Телефон',
            'Email' => 'Email',
            'IdRole' => 'Id Role',
            'Access_token' => 'Access Token',
            'Auth_key' => 'Auth Key',
            'PasswordConfirm' => 'Подтверждение пароля',
            'Agree' => 'Даю согласие на обработку данных ',
        ];
    }



}
