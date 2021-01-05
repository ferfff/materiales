<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "codigos".
 *
 * @property int $id
 * @property string $estado
 * @property int $cp_from
 * @property int $cp_to
 * @property string $coordenada
 */
class Codigos extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'codigos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estado', 'cp_from', 'cp_to', 'coordenada'], 'required'],
            [['cp_from', 'cp_to'], 'integer'],
            [['coordenada'], 'string'],
            [['estado'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'estado' => 'Estado',
            'cp_from' => 'Cp From',
            'cp_to' => 'Cp To',
            'coordenada' => 'Coordenada',
        ];
    }
}
