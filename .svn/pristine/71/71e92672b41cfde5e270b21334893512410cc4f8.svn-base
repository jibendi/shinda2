<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bp24h;

/**
 * Bp24hSearch represents the model behind the search form about `app\models\Bp24h`.
 */
class Bp24hSearch extends Bp24h
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idbp24', 'fk_person', 'leaflet_given', 'diary_given', 'succ_readings', 'diary_collected', 'wasuploaded'], 'integer'],
            [['date_abpm_started', 'time_abpm_start', 'time_abpm_end', 'time_bed', 'time_woke', 'serial_no_abpm'], 'safe'],
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
    public function search($params, $filter = "")
    {
        $query = Bp24h::find();

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
        $query->andWhere('tbl_bp_24h.altered = 1')
                ->andWhere("creation_name = '$username'");
        }

        $query->andFilterWhere([
            'idbp24' => $this->idbp24,
            'fk_person' => $this->fk_person,
            'date_abpm_started' => $this->date_abpm_started,
            'time_abpm_start' => $this->time_abpm_start,
            'time_abpm_end' => $this->time_abpm_end,
            'leaflet_given' => $this->leaflet_given,
            'diary_given' => $this->diary_given,
            'time_bed' => $this->time_bed,
            'time_woke' => $this->time_woke,
            'succ_readings' => $this->succ_readings,
            'diary_collected' => $this->diary_collected,
            'wasuploaded' => $this->wasuploaded,
        ]);

        $query->andFilterWhere(['like', 'serial_no_abpm', $this->serial_no_abpm]);

        return $dataProvider;
    }
}
