<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Participant;

/**
 * ParticipantSearch represents the model behind the search form about `app\models\Participant`.
 */
class ParticipantSearch extends Participant
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_p', 'study_no','pk_res', 'shinda2', 'shinda3'], 'integer'],
            [['name1', 'name2', 'name3', 'dob', 'agecat', 'ez_hm','locn', 'sublocn','filtered', 'names', 'consent', 'updated_name', 'pk_person', 'sex'], 'safe'],
            [['latt', 'longd'], 'number'],
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
    public function search($params, $date ='', $filter ='')
    {
        $query = Participant::find();

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
            'id_p' => $this->id_p,
            'sex' => $this->sex,
            'dob' => $this->dob,
            'study_no' => $this->study_no,
            'pk_res' => $this->pk_res,
            'latt' => $this->latt,
            'longd' => $this->longd,
            'shinda2' => $this->shinda2,
            'shinda3' => $this->shinda3,
        ]);
        
        if(!empty($date)){
             $query->andWhere(['appoint_date' => $date])
                     ->andWhere('appoint_level < 3 OR appoint_level IS NULL')
                     ->andWhere('consent IS NULL');
        }else if($filter == 1){
            $query->andWhere('filtered IS NULL');
        }else if(empty($filter)){
            $query->andWhere('filtered IS NOT NULL')
                  ->andWhere('filtered != 5');
        }else if($filter == 3){
            $username = Yii::$app->user->identity->username;
            $query->andWhere('altered = 1')
                    ->andWhere("updated_name = '$username'");
        }
        $query->andFilterWhere(['like', 'names', $this->names])
            ->andFilterWhere(['like', 'agecat', $this->agecat])
            ->andFilterWhere(['like', 'ez_hm', $this->ez_hm])
            ->andFilterWhere(['like', 'locn', $this->locn])
            ->andFilterWhere(['like', 'consent', $this->consent])
                ->andFilterWhere(['like', 'updated_name', $this->updated_name])
                ->andFilterWhere(['like', 'pk_person', $this->pk_person])
            ->andFilterWhere(['like', 'sublocn', $this->sublocn]);

        return $dataProvider;
    }
}
