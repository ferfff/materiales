<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tiendas".
 *
 * @property int $id
 * @property string $ciudad
 * @property string $cp
 * @property string $direccion
 * @property string $telefono
 *
 * @property TiendasProductos[] $tiendasProductos
 * @property Productos[] $productos
 */
class Tiendas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tiendas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ciudad', 'cp', 'direccion', 'telefono'], 'required'],
            [['ciudad', 'cp', 'direccion', 'telefono'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ciudad' => 'Ciudad',
            'cp' => 'Cp',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
        ];
    }

    /**
     * Gets query for [[TiendasProductos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTiendasProductos()
    {
        return $this->hasMany(TiendasProductos::className(), ['tiendas_id' => 'id']);
    }

    /**
     * Gets query for [[Productos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Productos::className(), ['id' => 'productos_id'])->viaTable('tiendas_productos', ['tiendas_id' => 'id']);
    }
}
