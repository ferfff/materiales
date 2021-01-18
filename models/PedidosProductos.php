<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedidos_productos".
 *
 * @property int $pedidos_id
 * @property int $productos_id
 * @property int $cantidad
 *
 * @property Pedidos $pedidos
 * @property Productos $productos
 */
class PedidosProductos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pedidos_productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pedidos_id', 'productos_id', 'cantidad'], 'required'],
            [['pedidos_id', 'productos_id', 'cantidad'], 'integer'],
            [['pedidos_id', 'productos_id'], 'unique', 'targetAttribute' => ['pedidos_id', 'productos_id']],
            [['pedidos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pedidos::className(), 'targetAttribute' => ['pedidos_id' => 'id']],
            [['productos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Productos::className(), 'targetAttribute' => ['productos_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pedidos_id' => 'Pedidos ID',
            'productos_id' => 'Productos ID',
            'cantidad' => 'Cantidad',
        ];
    }

    /**
     * Gets query for [[Pedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasOne(Pedidos::className(), ['id' => 'pedidos_id']);
    }

    /**
     * Gets query for [[Productos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasOne(Productos::className(), ['id' => 'productos_id']);
    }
}
