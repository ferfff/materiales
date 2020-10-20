<?php

namespace app\models;

use Yii;
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionTrait;

/**
 * This is the model class for table "productos".
 *
 * @property int $id
 * @property string $nombre
 * @property string $stock
 * @property string|null $descripcion
 * @property float|null $peso
 * @property string|null $categoria
 * @property string|null $foto
 * @property string|null $dimension
 *
 * @property PedidosProductos[] $pedidosProductos
 * @property Pedidos[] $pedidos
 * @property TiendasProductos[] $tiendasProductos
 * @property Tiendas[] $tiendas
 */
class Productos extends \yii\db\ActiveRecord implements CartPositionInterface
{
    use CartPositionTrait;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'stock'], 'required'],
            [['descripcion'], 'string'],
            [['peso', 'categoria'], 'number'],
            [['nombre', 'stock', 'foto'], 'string', 'max' => 45],
            [['dimension'], 'string', 'max' => 100],
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
            'stock' => 'Stock',
            'descripcion' => 'Descripcion',
            'peso' => 'Peso',
            'categoria' => 'Categoria',
            'foto' => 'Foto',
            'dimension' => 'Dimension',
        ];
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Gets query for [[PedidosProductos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidosProductos()
    {
        return $this->hasMany(PedidosProductos::className(), ['productos_id' => 'id']);
    }

    /**
     * Gets query for [[Categorias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategorias()
    {
        return $this->hasOne(Categorias::class, ['id' => 'categoria']);
    }

    /**
     * Gets query for [[Pedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedidos::class, ['id' => 'pedidos_id'])->viaTable('pedidos_productos', ['productos_id' => 'id']);
    }

    /**
     * Gets query for [[TiendasProductos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTiendasProductos()
    {
        return $this->hasMany(TiendasProductos::className(), ['productos_id' => 'id']);
    }

    /**
     * Gets query for [[Tiendas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTiendas()
    {
        return $this->hasMany(Tiendas::class, ['id' => 'tiendas_id'])->viaTable('tiendas_productos', ['productos_id' => 'id']);
    }
}
