<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "tiendas_productos".
 *
 * @property int $tiendas_id
 * @property int $productos_id
 * @property float $precio
 * @property float $precionet
 *
 * @property Productos $productos
 * @property Tiendas $tiendas
 */
class TiendasProductos extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tiendas_productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tiendas_id', 'productos_id', 'precio', 'precionet'], 'required'],
            [['tiendas_id', 'productos_id'], 'integer'],
            [['precio', 'precionet'], 'number'],
            [['tiendas_id', 'productos_id'], 'unique', 'targetAttribute' => ['tiendas_id', 'productos_id']],
            [['productos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Productos::class, 'targetAttribute' => ['productos_id' => 'id']],
            [['tiendas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tiendas::class, 'targetAttribute' => ['tiendas_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tiendas_id' => 'Tiendas ID',
            'productos_id' => 'Productos ID',
            'precio' => 'Precio',
            'precionet' => 'Precionet',
        ];
    }

    /**
     * Gets query for [[Productos]].
     *
     * @return ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasOne(Productos::class, ['id' => 'productos_id']);
    }

    /**
     * Gets query for [[Tiendas]].
     *
     * @return ActiveQuery
     */
    public function getTiendas()
    {
        return $this->hasOne(Tiendas::class, ['id' => 'tiendas_id']);
    }

    public function getPrecio()
    {
        return $this->precio;
    }
}
