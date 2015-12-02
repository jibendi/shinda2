<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%questionnaire}}".
 *
 * @property integer $id
 * @property integer $fk_person
 * @property string $date_interview
 * @property string $time_interview
 * @property string $pregnant
 * @property string $menstruating
 * @property string $lmp
 * @property string $ever_diagnosed_hbp
 * @property string $under_med_hbp
 * @property string $hbp_med_list
 * @property string $suffered_malaria
 * @property integer $mal_episodes
 * @property string $dates_mal_occured
 * @property string $mal_hospitalised
 * @property string $other_med_condition
 * @property string $med_condition_list
 * @property string $place_of_birth
 * @property string $date_of_relocation
 * @property string $places_before_relocation
 * @property string $Longest_time_away
 * @property string $left_date
 * @property string $return_date
 * @property string $place_away
 * @property string $household_school_greater_5
 * @property string $household_not_attend_primary
 * @property integer $mother_edu_level
 * @property integer $child_5yrs_late
 * @property string $household_malnourished
 * @property string $electricity
 * @property integer $toilet_type
 * @property string $share_toilet
 * @property string $safe_drinking_water
 * @property string $distance_safe_water_access
 * @property integer $floor_type
 * @property integer $fuel_type
 * @property integer $household_own
 * @property string $creation_name
 *
 * @property Participant $fkPerson
 */
class Questionnaire extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%questionnaire}}';
    }

    /**
     * @inheritdoc
     */
    public $car;
    public $refridgerator;
    public $bicycle;
    public $radio;
    public $television;
    public $own_none;
    
    public $enalapril;
    public $atenolol;
    public $propranolol;
    public $hydrochlorthiazide;
    public $frusemide;
    public $aldactone;
    
    public $methyldopa;
    public $nifedipine;
    public $hydralazine;
    public function rules()
    {
        return [
            [['fk_person', 'date_interview', 'ever_diagnosed_hbp', 'suffered_malaria', 'other_med_condition', 'place_of_birth_current', 'household_school_greater_5', 'household_not_attend_primary', 'child_5yrs_late', 'household_malnourished', 'electricity', 'toilet_type', 'share_toilet', 'safe_drinking_water', 'distance_safe_water_access', 'floor_type', 'fuel_type', 'household_own', 'child_5yrs_late', 'mother_edu_level'], 'required'],
            [['fk_person', 'mal_episodes', 'time_safe_water_access', 'Longest_time_away'], 'integer'],
            [['date_interview', 'time_interview', 'dates_mal_occured', 'left_date', 'return_date', 'time_units', 'other_med_condition_name', 'place_of_birth_current', 'place_of_birth_specify', 'longest_time_specify', 'mother_edu_level', 'altered'], 'safe'],
            [['menstruating', 'lmp', 'hbp_med_list', 'places_before_relocation', 'place_away'], 'string'],
            [['pregnant', 'ever_diagnosed_hbp', 'under_med_hbp', 'suffered_malaria', 'mal_hospitalised', 'other_med_condition', 'household_not_attend_primary', 'household_malnourished', 'electricity', 'share_toilet', 'safe_drinking_water'], 'string', 'max' => 3],
            [['med_condition_list', 'Longest_time_away', 'household_school_greater_5', 'time_safe_water_access', 'creation_name'], 'string', 'max' => 30],
            [['place_of_birth', 'date_of_relocation'], 'string', 'max' => 100],
            [['date_of_relocation', 'left_date', 'return_date', 'date_interview'],'date', 'format'=>'yyyy-mm-dd', 'message'=>'The date format is supposed to be yy-mm-dd'],
            ['date_interview', 'validatedate_interview']
        ];
    }
    
    function validatedate_interview($attribute, $params){
        $now = new \DateTime();
        $dateinterview = new \DateTime($this->$attribute);
        if($dateinterview > $now){
            $this->addError($attribute, "The date of interview cannot be in future, not realistic");
        }
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fk_person' => 'PID',
            'date_interview' => 'Date of interview',
            'time_interview' => 'Time of interview',
            'pregnant' => 'Pregnant?',
            'menstruating' => 'Menstruating?',
            'lmp' => 'When was the last menstruating period?',
            'ever_diagnosed_hbp' => 'Diagnosed with high blood pressure ever?',
            'under_med_hbp' => 'Currently under any medication for high blood pressure?',
            'hbp_med_list' => 'List the drugs',
            'suffered_malaria' => 'Suffered from malaria before?',
            'mal_episodes' => 'Number of malaria episodes',
            'dates_mal_occured' => 'Date when the last malaria episode occured',
            'mal_hospitalised' => 'Hospitalised for Malaria?',
            'other_med_condition' => 'Any other medical condition?',
            'med_condition_list' => 'Any other medical condition,List the drugs',
            'place_of_birth' => 'Place of birth',
            'date_of_relocation' => 'When did you migrate to the current place?',
            'places_before_relocation' => 'List the places you stayed before migrating',
            'Longest_time_away' => 'Whats the longest time you have been away?',
            'left_date' => 'The date you left',
            'return_date' => 'The date you returned',
            'place_away' => 'List the places you went to',
            'household_school_greater_5' => 'Anyone in the household who completed atleast 5 years of schooling',
            'household_not_attend_primary' => 'Is there anyone who suppose to attend primary but not attending',
            'mother_edu_level' => 'Mother level of education?',
            'child_5yrs_late' => 'Has any child(<5yrs) in the household died recently or past',
            'household_malnourished' => 'Any member of the family(adult/child) considered malnourished',
            'electricity' => 'Do you have electricty?',
            'toilet_type' => 'Type of toilet in use?',
            'share_toilet' => 'Do you share the toilet?',
            'safe_drinking_water' => 'Do you have access to safe drinking water?(Tap, Stream, Borehole, River)',
            'time_safe_water_access' => 'Time taken to access safe water',
            'floor_type' => 'Floor type of the house',
            'fuel_type' => 'Fuel type used for cooking?',
            'household_own' => 'Do you own any of the following',
            'creation_name' => 'Creation Name',
            'time_units' => 'Units of the time',
            'other_med_condition_name' => 'State the condition',
            'electricity2' => 'electricity',
            'place_of_birth_current' => 'Were you born here(current place)?',
            'place_of_birth_specify' => 'Specify place you were born?',
            'longest_time_specify' => 'Specify the longest time away'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkPerson()
    {
        return $this->hasOne(Participant::className(), ['pk_person' => 'fk_person']);
    }
}
