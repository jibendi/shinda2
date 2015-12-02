<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%bp_spot}}".
 *
 * @property integer $id_bps
 * @property integer $fk_person
 * @property string $date_visit
 * @property string $time_visit
 * @property integer $consent_signed
 * @property integer $not_consented_rsn
 * @property integer $study_info_given
 * @property double $height
 * @property double $weight
 * @property double $muac
 * @property double $ssn
 * @property integer $pulse
 * @property integer $bp_syst_1
 * @property integer $bp_dyst_1
 * @property integer $bp_syst_2
 * @property integer $bp_dyst_2
 * @property integer $bp_syst_3
 * @property integer $bp_dyst_3
 * @property string $serial_no_bpm
 *
 * @property Participant $fkPerson
 */
class Bpspot extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%bp_spot}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'fk_person', 'date_visit', 'time_visit', 'serial_no_bpm'], 'required'],
            [['not_consented_rsn', 'pulse', 'bp_syst_1', 'bp_dyst_1', 'bp_syst_2', 'bp_dyst_2', 'bp_syst_3', 'bp_dyst_3', 'pulse_1', 'pulse_2', 'pulse_3'], 'integer'],
            [['date_visit', 'time_visit', 'creation_date', 'creation_date', 'study_info_given', 'creation_name', 'update_name', 'altered'], 'safe'],
            [['date_visit'],'date', 'format'=>'yyyy-m-d', 'message'=>'The date format should yy-m-d'],
            [['height', 'weight', 'muac', 'ssn'], 'number'],
            [['serial_no_bpm'], 'string', 'max' => 20],
            ['date_visit', 'validatedate'],
            [['weight'], 'integer', 'min'=>30, 'max'=>250],
            [['muac'], 'integer', 'min'=>10, 'max'=>50],
            [['pulse_1', 'pulse_2', 'pulse_3'], 'integer', 'min'=>30, 'max'=>300],
             [['bp_syst_1', 'bp_syst_2', 'bp_syst_3'], 'integer', 'min'=>40, 'max'=>350],
            [['bp_dyst_1', 'bp_dyst_2', 'bp_dyst_3'], 'integer', 'min'=>30, 'max'=>250],
            //['time_visit', 'validatetime']
        ];
    }

    public function validatedate($attribute, $params){
        $now = new \DateTime();
        $datevisit = new \DateTime($this->$attribute);
        //$diff = ceil($now->diff($datevisit)->days/365.5);
        if($datevisit > $now){
            $this->addError($attribute,  "The date of visit cannot be in the future, not realistic ");
        }
    }
    
    public function validatetime($attribute, $params){
        $this->addError($attribute,  $this->$attribute);
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_bps' => 'Id Bps',
            'fk_person' => 'PID:',
            'date_visit' => 'Date Visit:',
            'time_visit' => 'Time Visit:',
            'consent_signed' => 'Consent Signed?',
            'not_consented_rsn' => 'Reason Not Consented',
            'study_info_given' => 'Infomation sheet given?',
            'height' => 'Height',
            'weight' => 'Weight',
            'muac' => 'MUAC',
            'ssn' => 'SSN',
            'pulse' => 'Pulse',
            'bp_syst_1' => 'Bp Syst 1',
            'bp_dyst_1' => 'Bp Dyst 1',
            'bp_syst_2' => 'Bp Syst 2',
            'bp_dyst_2' => 'Bp Dyst 2',
            'bp_syst_3' => 'Bp Syst 3',
            'bp_dyst_3' => 'Bp Dyst 3',
            'serial_no_bpm' => 'Serial No of BP Machine',
            'fullName' => 'Full Name'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFullName() {
        return $this->fkPerson->name1." ".$this->fkPerson->name2;
    }
    
    public function getFkPerson()
    {
        return $this->hasOne(Participant::className(), ['pk_person' => 'fk_person']);
    }
    
   
}
