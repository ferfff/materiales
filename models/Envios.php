<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "envios".
 *
 * @property int $id
 * @property int|null $max
 * @property int|null $min
 * @property float|null $precio
 */
class Envios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'envios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['max', 'min'], 'integer'],
            [['precio'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'max' => 'Max',
            'min' => 'Min',
            'precio' => 'Precio',
        ];
    }
}
