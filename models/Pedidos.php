<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedidos".
 *
 * @property int $id
 * @property int $users_id
 * @property float $precioenvio
 * @property int|null $kilometros
 * @property string $estatus
 * @property string|null $direccion_envio
 *
 * @property Users $users
 * @property PedidosProductos[] $pedidosProductos
 * @property Productos[] $productos
 */
class Pedidos extends \yii\db\ActiveRecord
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
            [['users_id', 'precioenvio'], 'required'],
            [['users_id', 'kilometros'], 'integer'],
            [['precioenvio'], 'number'],
            [['estatus', 'direccion_envio'], 'string'],
            [['users_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['users_id' => 'id']],
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
            'kilometros' => 'Kilometros',
            'estatus' => 'Estatus',
            'direccion_envio' => 'Direccion Envio',
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasOne(Users::className(), ['id' => 'users_id']);
    }

    /**
     * Gets query for [[PedidosProductos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidosProductos()
    {
        return $this->hasMany(PedidosProductos::className(), ['pedidos_id' => 'id']);
    }

    /**
     * Gets query for [[Productos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Productos::className(), ['id' => 'productos_id'])->viaTable('pedidos_productos', ['pedidos_id' => 'id']);
    }
}
