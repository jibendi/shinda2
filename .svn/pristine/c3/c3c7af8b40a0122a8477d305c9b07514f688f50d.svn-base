<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Urine;

/**
 * UrineSearch represents the model behind the search form about `app\models\Urine`.
 */
class UrineSearch extends Urine
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'fk_person', 'spot_urine_collected', 'reason_not_collected', 'result_complete'], 'integer'],
            [['date_visit', 'time_visit', 'date_collect_urine', 'date_received_urine', 'time_received_urine', 'date_result_spot_urine', 'time_result_spot_urine', 'year', 'clinician', 'aliquots', 'sample_labelled', 'frozen', 'tech_initials_r', 'tech_date_r', 'tech_time_r', 'tech_initials_p', 'tech_date_p', 'tech_time_p'], 'safe'],
            [['spot_na_urine', 'spot_k_urine', 'spot_cr_urine', 'spot_alb_urine'], 'number'],
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
    public function search($params, $filter="")
    {
        $query = Urine::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        if($filter == 1){
                $username = Yii::$app->user->identity->username;
        $query->andWhere('tbl_urine.altered = 1')
                ->andWhere("creation_name = '$username'");
        }
        $query->andFilterWhere([
            'id' => $this->id,
            'fk_person' => $this->fk_person,
            'date_visit' => $this->date_visit,
            'time_visit' => $this->time_visit,
            'spot_urine_collected' => $this->spot_urine_collected,
            'reason_not_collected' => $this->reason_not_collected,
            'date_collect_urine' => $this->date_collect_urine,
            'date_received_urine' => $this->date_received_urine,
            'time_received_urine' => $this->time_received_urine,
            'date_result_spot_urine' => $this->date_result_spot_urine,
            'time_result_spot_urine' => $this->time_result_spot_urine,
            'spot_na_urine' => $this->spot_na_urine,
            'spot_k_urine' => $this->spot_k_urine,
            'spot_cr_urine' => $this->spot_cr_urine,
            'spot_alb_urine' => $this->spot_alb_urine,
            'year' => $this->year,
            'result_complete' => $this->result_complete,
            'tech_date_r' => $this->tech_date_r,
            'tech_time_r' => $this->tech_time_r,
            'tech_date_p' => $this->tech_date_p,
            'tech_time_p' => $this->tech_time_p,
        ]);

        $query->andFilterWhere(['like', 'clinician', $this->clinician])
            ->andFilterWhere(['like', 'aliquots', $this->aliquots])
            ->andFilterWhere(['like', 'sample_labelled', $this->sample_labelled])
            ->andFilterWhere(['like', 'frozen', $this->frozen])
            ->andFilterWhere(['like', 'tech_initials_r', $this->tech_initials_r])
            ->andFilterWhere(['like', 'tech_initials_p', $this->tech_initials_p]);

        return $dataProvider;
    }
}
