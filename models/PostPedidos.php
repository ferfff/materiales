<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pedidos;

/**
 * PostPedidos represents the model behind the search form of `app\models\Pedidos`.
 */
class PostPedidos extends Pedidos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'users_id'], 'integer'],
            [['precioenvio', 'preciototal'], 'number'],
            [['date'], 'date'],
            [['estatus', 'direccion_envio', 'nombre', 'email'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Pedidos::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'users_id' => $this->users_id,
            'precioenvio' => $this->precioenvio,
            'preciototal' => $this->preciototal,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'estatus', $this->estatus])
            ->andFilterWhere(['like', 'direccion_envio', $this->direccion_envio])
            ->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'nombre', $this->nombre]);

        return $dataProvider;
    }
}
