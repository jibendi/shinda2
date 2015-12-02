<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Monitoringbp24data;

/**
 * Monitoringbp24dataSearch represents the model behind the search form about `app\models\Monitoringbp24data`.
 */
class Monitoringbp24dataSearch extends Monitoringbp24data
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_monitor', 'SBPbr', 'dia', 'pulse', 'SBPao', 'fk_person', 'fk_id24h', 'fk_study_no'], 'integer'],
            [['time', 'date_creation', 'comments'], 'safe'],
            [['AIXao', 'AIXbr', 'PWVao', 'PWVsd'], 'number'],
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
        $query = Monitoringbp24data::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_monitor' => $this->id_monitor,
            'time' => $this->time,
            'SBPbr' => $this->SBPbr,
            'dia' => $this->dia,
            'pulse' => $this->pulse,
            'SBPao' => $this->SBPao,
            'AIXao' => $this->AIXao,
            'AIXbr' => $this->AIXbr,
            'PWVao' => $this->PWVao,
            'PWVsd' => $this->PWVsd,
            'fk_person' => $this->fk_person,
            'date_creation' => $this->date_creation,
            'fk_id24h' => $this->fk_id24h,
            'fk_study_no' => $this->fk_study_no,
        ]);

        $query->andFilterWhere(['like', 'comments', $this->comments]);

        return $dataProvider;
    }
}
