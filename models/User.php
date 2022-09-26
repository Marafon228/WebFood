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
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'User';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Login', 'Password', 'FirsName', 'MidleName', 'LastName', 'Adress', 'Phone', 'Email', 'IdRole'], 'required'],
            [['IdRole'], 'integer'],
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
            'Login' => 'Login',
            'Password' => 'Password',
            'FirsName' => 'Firs Name',
            'MidleName' => 'Midle Name',
            'LastName' => 'Last Name',
            'Adress' => 'Adress',
            'Phone' => 'Phone',
            'Email' => 'Email',
            'IdRole' => 'Id Role',
            'Access_token' => 'Access Token',
            'Auth_key' => 'Auth Key',
        ];
    }

    /**
     * Gets query for [[IdRole]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdRole()
    {
        return $this->hasOne(Role::class, ['Id' => 'IdRole']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['IdUser' => 'Id']);
    }

    /**
     * Gets query for [[UsersAndEnterprises]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsersAndEnterprises()
    {
        return $this->hasMany(UsersAndEnterprise::class, ['IdUser' => 'Id']);
    }


    ###############################################

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        ##################
        #Авторизация по токену (нужно сделать !!!)
        ###############

        /*foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;*/
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::find()->where(['login' => $username]) ->one();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        //Доделать !!!
        /*return $this->authKey;*/
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        /*return $this->authKey === $authKey;*/
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->Password === $password;
    }

}
