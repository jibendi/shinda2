<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Blood;

/**
 * BloodSearch represents the model behind the search form about `app\models\Blood`.
 */
class BloodSearch extends Blood
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'fk_person', 'wbc', 'hb', 'rbc', 'mcv', 'mchc', 'rdw', 'plt'], 'integer'],
            [['blood_collected', 'reason_blood_not_collected', 'date_collect_blood', 'time_blood_collected', 'sample_labelled', 'genotype_aliquots', 'fbc_aliquots', 'elisa_aliquots', 'shinda_labels', 'frozen', 'fw_visit1', 'date_visit', 'time_visit', 'date_received_blood', 'time_received_blood', 'date_result_spot_blood', 'time_result_spot_blood', 'sickle_type', 'alpha_thela', 'tech_initial', 'tech_date', 'tech_time'], 'safe'],
            [['na', 'k', 'cr', 'urea', 'chloride', 'angiopoietin2', 'HbA1c'], 'number'],
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
    public function search($params, $filter ="")
    {
        $query = Blood::find();

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
        $query->andWhere('tbl_blood.altered = 1')
                ->andWhere("creation_name = '$username'");
        }
        $query->andFilterWhere([
            'id' => $this->id,
            'fk_person' => $this->fk_person,
            'date_collect_blood' => $this->date_collect_blood,
            'time_blood_collected' => $this->time_blood_collected,
            'date_visit' => $this->date_visit,
            'time_visit' => $this->time_visit,
            'date_received_blood' => $this->date_received_blood,
            'time_received_blood' => $this->time_received_blood,
            'date_result_spot_blood' => $this->date_result_spot_blood,
            'time_result_spot_blood' => $this->time_result_spot_blood,
            'wbc' => $this->wbc,
            'hb' => $this->hb,
            'rbc' => $this->rbc,
            'mcv' => $this->mcv,
            'mchc' => $this->mchc,
            'rdw' => $this->rdw,
            'plt' => $this->plt,
            'na' => $this->na,
            'k' => $this->k,
            'cr' => $this->cr,
            'urea' => $this->urea,
            'chloride' => $this->chloride,
            'angiopoietin2' => $this->angiopoietin2,
            'HbA1c' => $this->HbA1c,
            'tech_date' => $this->tech_date,
            'tech_time' => $this->tech_time,
        ]);

        $query->andFilterWhere(['like', 'blood_collected', $this->blood_collected])
            ->andFilterWhere(['like', 'reason_blood_not_collected', $this->reason_blood_not_collected])
            ->andFilterWhere(['like', 'sample_labelled', $this->sample_labelled])
            ->andFilterWhere(['like', 'genotype_aliquots', $this->genotype_aliquots])
            ->andFilterWhere(['like', 'fbc_aliquots', $this->fbc_aliquots])
            ->andFilterWhere(['like', 'elisa_aliquots', $this->elisa_aliquots])
            ->andFilterWhere(['like', 'shinda_labels', $this->shinda_labels])
            ->andFilterWhere(['like', 'frozen', $this->frozen])
            ->andFilterWhere(['like', 'fw_visit1', $this->fw_visit1])
            ->andFilterWhere(['like', 'sickle_type', $this->sickle_type])
            ->andFilterWhere(['like', 'alpha_thela', $this->alpha_thela])
            ->andFilterWhere(['like', 'tech_initial', $this->tech_initial]);

        return $dataProvider;
    }
}
