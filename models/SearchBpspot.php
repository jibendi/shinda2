<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bpspot;

/**
 * SearchBpspot represents the model behind the search form about `app\models\Bpspot`.
 */
class SearchBpspot extends Bpspot
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_bps','fk_person', 'consent_signed', 'not_consented_rsn', 'study_info_given', 'pulse', 'bp_syst_1', 'bp_dyst_1', 'bp_syst_2', 'bp_dyst_2', 'bp_syst_3', 'bp_dyst_3'], 'integer'],
            [['date_visit', 'time_visit', 'serial_no_bpm', 'altered'], 'safe'],
            [['height', 'weight', 'muac', 'ssn'], 'number'],
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
        $query = Bpspot::find();

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
            'id_bps' => $this->id_bps,
            'fk_person' => $this->fk_person,
            'date_visit' => $this->date_visit,
            'time_visit' => $this->time_visit,
            'consent_signed' => $this->consent_signed,
            'not_consented_rsn' => $this->not_consented_rsn,
            'study_info_given' => $this->study_info_given,
            'height' => $this->height,
            'weight' => $this->weight,
            'muac' => $this->muac,
            'ssn' => $this->ssn,
            'pulse' => $this->pulse,
            'bp_syst_1' => $this->bp_syst_1,
            'bp_dyst_1' => $this->bp_dyst_1,
            'bp_syst_2' => $this->bp_syst_2,
            'bp_dyst_2' => $this->bp_dyst_2,
            'bp_syst_3' => $this->bp_syst_3,
            'bp_dyst_3' => $this->bp_dyst_3,
        ]);

        $query->andFilterWhere(['like', 'serial_no_bpm', $this->serial_no_bpm]);

        return $dataProvider;
    }
}
