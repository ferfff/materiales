<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "pedidos".
 *
 * @property int $id
 * @property int|null $users_id
 * @property float $precioenvio
 * @property string $estatus
 * @property string|null $direccion_envio
 * @property float $preciototal
 * @property string|null $nombre
 * @property string $email
 * @property string|null $date
 *
 * @property User $users
 * @property PedidosProductos[] $pedidosProductos
 * @property Productos[] $productos
 */
class Pedidos extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pedidos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users_id'], 'integer'],
            [['precioenvio', 'preciototal'], 'required'],
            [['precioenvio', 'preciototal'], 'number'],
            [['estatus', 'direccion_envio'], 'string'],
            [['date'], 'safe'],
            ['email', 'email'],
            [['nombre'], 'string', 'max' => 255],
            [['users_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['users_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'users_id' => 'Users ID',
            'precioenvio' => 'Precioenvio',
            'estatus' => 'Estatus',
            'email' => 'E-mail',
            'direccion_envio' => 'Direccion Envio',
            'preciototal' => 'Preciototal',
            'datos' => 'Datos',
            'date' => 'Date',
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasOne(User::class, ['id' => 'users_id']);
    }

    /**
     * Gets query for [[PedidosProductos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidosProductos()
    {
        return $this->hasMany(PedidosProductos::class, ['pedidos_id' => 'id']);
    }

    /**
     * Gets query for [[Productos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Productos::class, ['id' => 'productos_id'])->viaTable('pedidos_productos', ['pedidos_id' => 'id']);
    }
}
