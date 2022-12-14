<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Enterprise;

/**
 * EnterpriseSearch represents the model behind the search form of `app\models\Enterprise`.
 */
class EnterpriseSearch extends Enterprise
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'IdType'], 'integer'],
            [['Name', 'Address'], 'safe'],
            [['Latitude', 'Longitude'], 'number'],
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
        $query = Enterprise::find();

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
            'Id' => $this->Id,
            'IdType' => $this->IdType,
            'Latitude' => $this->Latitude,
            'Longitude' => $this->Longitude,
        ]);

        $query->andFilterWhere(['like', 'Name', $this->Name])
            ->andFilterWhere(['like', 'Address', $this->Address]);

        return $dataProvider;
    }
    public function searchForEnterpriseId($params,$IdEnterprise)
    {
        $query = Enterprise::find();

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


        #$query->andWhere(['IdProduct'=>$IdEnterprise]);
        // grid filtering conditions
        $query->andFilterWhere([
            'Id' => $this->Id,
            'IdType' => $this->IdType,
            'Latitude' => $this->Latitude,
            'Longitude' => $this->Longitude,
        ]);

        $query->andFilterWhere(['like', 'Name', $this->Name])
            ->andFilterWhere(['like', 'Address', $this->Address]);

        return $dataProvider;
    }
}
