<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $nombre
 * @property string $paterno
 * @property string|null $materno
 * @property string $telefono
 * @property string $email
 * @property string $calle
 * @property string $numero
 * @property string|null $interior
 * @property string $colonia
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
            [['nombre', 'paterno', 'telefono', 'email', 'calle', 'numero', 'colonia', 'cp', 'ciudad'], 'required'],
            [['tipo'], 'string'],
            [['nombre', 'paterno', 'materno', 'telefono', 'email', 'calle', 'authKey'], 'string', 'max' => 50],
            [['numero'], 'string', 'max' => 10],
            [['interior', 'colonia', 'cp', 'ciudad', 'estado'], 'string', 'max' => 45],
            [['password'], 'string', 'max' => 100],
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
            'paterno' => 'Paterno',
            'materno' => 'Materno',
            'telefono' => 'Telefono',
            'email' => 'Email',
            'calle' => 'Calle',
            'numero' => 'Numero',
            'interior' => 'Interior',
            'colonia' => 'Colonia',
            'estado' => 'Estado',
            'cp' => 'Código Postal',
            'ciudad' => 'Ciudad',
            'tipo' => 'Tipo',
            'password' => 'Password',
            'authKey' => 'Auth Key',
        ];
    }

    /**
     * Gets query for [[Pedidos]].
     *
     * @return \yii\db\ActiveQuery
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
