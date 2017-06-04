<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Request;

/**
 * RequestSearch represents the model behind the search form about `app\modules\admin\models\Request`.
 */
class RequestSearch extends Request
{
    public $name;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tariff_id', 'status'], 'integer'],
            [['surname', 'first_name', 'second_name', 'address', 'phone', 'date', 'name'], 'safe'],
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
        $query = Request::find()->joinWith('tariffs');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

//        $dataProvider->setSort([
//            'attributes' => [
//                'name' => [
//                    'asc' => ['tariffs.name' => SORT_ASC],
//                    'desc' => ['tariffs.name' => SORT_DESC],
//                    'label' => 'Тариф'
//                ]
//            ]
//        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'name' => $this->name,
        ]);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'tariff_id' => $this->tariff_id,
            'date' => $this->date,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'second_name', $this->second_name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'phone', $this->phone]);

        return $dataProvider;
    }
}
