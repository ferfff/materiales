<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellidos
 * @property string $telefono
 * @property string $email
 * @property string $direccion
 * @property string $cp
 * @property string $ciudad
 * @property string $estado
 * @property string $tipo
 * @property string|null $password
 * @property string|null $authKey
 *
 * @property Pedidos[] $pedidos
 */
class User extends ActiveRecord implements IdentityInterface
{
    const ROLE_USER = 1;
    const ROLE_ADMIN = 2;

    public $old_password;
    public $new_password;
    public $repeat_password;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellidos', 'telefono', 'email', 'direccion', 'cp', 'ciudad', 'estado', 'password'], 'required'],
            [['tipo'], 'string'],
            [['nombre', 'telefono', 'email', 'authKey'], 'string', 'max' => 50],
            [['apellidos', 'estado', 'password'], 'string', 'max' => 100],
            [['direccion'], 'string', 'max' => 200],
            [['cp', 'ciudad'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'apellidos' => 'Apellidos',
            'telefono' => 'Teléfono',
            'email' => 'Email',
            'direccion' => 'Dirección',
            'cp' => 'CP',
            'ciudad' => 'Ciudad',
            'estado' => 'Estado',
            'tipo' => 'Tipo',
            'password' => 'Password',
            'authKey' => 'Auth Key',
        ];
    }

    /**
     * Gets query for [[Pedidos]].
     *
     * @return ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedidos::class, ['users_id' => 'id']);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds user by email
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        //return static::findOne(['access_token' => $token]);
        throw new NotSupportedException();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    public static function isAdmin($id)
    {
        if (static::findOne(['id' => $id, 'nivel' => self::ROLE_ADMIN])){
            return true;
        } else {
            return false;
        }
    }
}
