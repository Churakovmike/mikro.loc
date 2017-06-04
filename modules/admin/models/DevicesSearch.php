<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Devices;

/**
 * DevicesSearch represents the model behind the search form about `app\modules\admin\models\Devices`.
 */
class DevicesSearch extends Devices
{
    public $namestation;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'station_id'], 'integer'],
            [['name', 'serialnumber', 'serial', 'regnumber', 'namestation'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Devices::find()->joinWith('stations');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

//        $dataProvider->setSort([
//            'attributes' => [
//                'namestation' => [
//                    'asc' => ['stations.namestation' => SORT_ASC],
//                    'desc' => ['stations.namestation' => SORT_DESC],
//                    'label' => 'Базовая станция'
//                ]
//            ]
//        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'station_id' => $this->station_id,
        ]);
        $query->andFilterWhere([
            'namestation' => $this->namestation,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'serialnumber', $this->serialnumber])
            ->andFilterWhere(['like', 'serial', $this->serial])
            ->andFilterWhere(['like', 'regnumber', $this->regnumber]);

        return $dataProvider;
    }
}
