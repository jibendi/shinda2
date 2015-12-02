<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Questionnaire;

/**
 * QuestionnaireSearch represents the model behind the search form about `app\models\Questionnaire`.
 */
class QuestionnaireSearch extends Questionnaire
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'fk_person', 'mal_episodes', 'mother_edu_level', 'child_5yrs_late', 'toilet_type', 'floor_type', 'fuel_type', 'household_own'], 'integer'],
            [['date_interview', 'time_interview', 'pregnant', 'menstruating', 'lmp', 'ever_diagnosed_hbp', 'under_med_hbp', 'hbp_med_list', 'suffered_malaria', 'dates_mal_occured', 'mal_hospitalised', 'other_med_condition', 'med_condition_list', 'place_of_birth', 'date_of_relocation', 'places_before_relocation', 'Longest_time_away', 'left_date', 'return_date', 'place_away', 'household_school_greater_5', 'household_not_attend_primary', 'household_malnourished', 'electricity', 'share_toilet', 'safe_drinking_water', 'time_safe_water_access', 'creation_name'], 'safe'],
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
        $query = Questionnaire::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        $username = Yii::$app->user->identity->username;
        $query->andWhere('altered = 1')
                ->andWhere("creation_name = '$username'");

        $query->andFilterWhere([
            'id' => $this->id,
            'fk_person' => $this->fk_person,
            'date_interview' => $this->date_interview,
            'time_interview' => $this->time_interview,
            'mal_episodes' => $this->mal_episodes,
            'dates_mal_occured' => $this->dates_mal_occured,
            'left_date' => $this->left_date,
            'return_date' => $this->return_date,
            'mother_edu_level' => $this->mother_edu_level,
            'child_5yrs_late' => $this->child_5yrs_late,
            'toilet_type' => $this->toilet_type,
            'floor_type' => $this->floor_type,
            'fuel_type' => $this->fuel_type,
            'household_own' => $this->household_own,
        ]);

        $query->andFilterWhere(['like', 'pregnant', $this->pregnant])
            ->andFilterWhere(['like', 'menstruating', $this->menstruating])
            ->andFilterWhere(['like', 'lmp', $this->lmp])
            ->andFilterWhere(['like', 'ever_diagnosed_hbp', $this->ever_diagnosed_hbp])
            ->andFilterWhere(['like', 'under_med_hbp', $this->under_med_hbp])
            ->andFilterWhere(['like', 'hbp_med_list', $this->hbp_med_list])
            ->andFilterWhere(['like', 'suffered_malaria', $this->suffered_malaria])
            ->andFilterWhere(['like', 'mal_hospitalised', $this->mal_hospitalised])
            ->andFilterWhere(['like', 'other_med_condition', $this->other_med_condition])
            ->andFilterWhere(['like', 'med_condition_list', $this->med_condition_list])
            ->andFilterWhere(['like', 'place_of_birth', $this->place_of_birth])
            ->andFilterWhere(['like', 'date_of_relocation', $this->date_of_relocation])
            ->andFilterWhere(['like', 'places_before_relocation', $this->places_before_relocation])
            ->andFilterWhere(['like', 'Longest_time_away', $this->Longest_time_away])
            ->andFilterWhere(['like', 'place_away', $this->place_away])
            ->andFilterWhere(['like', 'household_school_greater_5', $this->household_school_greater_5])
            ->andFilterWhere(['like', 'household_not_attend_primary', $this->household_not_attend_primary])
            ->andFilterWhere(['like', 'household_malnourished', $this->household_malnourished])
            ->andFilterWhere(['like', 'electricity', $this->electricity])
            ->andFilterWhere(['like', 'share_toilet', $this->share_toilet])
            ->andFilterWhere(['like', 'safe_drinking_water', $this->safe_drinking_water])
            ->andFilterWhere(['like', 'time_safe_water_access', $this->time_safe_water_access])
            ->andFilterWhere(['like', 'creation_name', $this->creation_name]);

        return $dataProvider;
    }
}
