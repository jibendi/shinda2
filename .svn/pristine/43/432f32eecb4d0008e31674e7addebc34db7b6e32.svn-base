<?php

namespace app\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "{{%participant}}".
 *
 * @property integer $id_p
 * @property integer $pk_person
 * @property string $name1
 * @property string $name2
 * @property string $name3
 * @property integer $sex
 * @property string $dob
 * @property integer $study_no
 * @property integer $age
 * @property string $agecat
 * @property integer $pk_res
 * @property string $ez_hm
 * @property string $locn
 * @property string $sublocn
 * @property double $latt
 * @property double $longd
 * @property integer $shinda2
 * @property integer $shinda3
 * @property integer $visited1
 * @property integer $visited2
 * @property integer $visited3
 * @property integer $studyArea
 * @property integer $visited2nd
 *
 * @property Bp24h[] $bp24hs
 * @property BpSpot[] $bpSpots
 * @property Questionnaire[] $questionnaires
 * @property Urine[] $urines
 */
class Participant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%participant}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'age', 'pk_res', 'shinda2', 'shinda3'], 'integer'],
            [['dob', 'appoint_date', 'date_visit1', 'date_visit2', 'date_visit3', 'res_status1', 'res_status2', 'res_status3', 'altered', 'filtered', 'consent', 'reason_notconsented', 'appoint_level', 'updated_time', 'updated_name', 'study_no'], 'safe'],
            [['latt', 'longd'], 'number'],
            [['res_status1', 'date_visit1'], 'required'],
            [['date_visit1'], 'date', 'format'=>'yyyy-mm-dd', 'message'=>'Date format should be yyyy-mm-dd'],
             [['appoint_date'], 'date', 'format'=>'mm/dd/yyyy', 'message'=>'Date format should be mm/dd/yyyy'],
            [['name1', 'name2', 'name3', 'locn', 'sublocn'], 'string', 'max' => 20],
            [['agecat'], 'string', 'max' => 6],
            [['ez_hm'], 'string', 'max' => 11],
            [['pk_person'], 'unique'],
            ['date_visit1','validateVisit1'],
            ['date_visit2','validateVisit2'],
            ['date_visit3','validateVisit3'],
            ['appoint_date', 'checkifmonday'],
            ['appoint_date', 'checksequence']
        ];
    }
    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_p' => 'Id P',
            'pk_person' => 'PID',
            'name1' => 'First Name',
            'name2' => 'Second Name',
            'name3' => 'Third Name',
            'sex' => 'Sex',
            'dob' => 'DOB',
            'study_no' => 'Study No',
            'age' => 'Age',
            'agecat' => 'Agecat',
            'pk_res' => 'Pk Res',
            'ez_hm' => 'Ez Hm',
            'locn' => 'Locn',
            'sublocn' => 'Sublocn',
            'latt' => 'Latt',
            'longd' => 'Longd',
            'shinda2' => 'Shinda2',
            'shinda3' => 'Shinda3',
            'visited1' => 'Visited1',
            'visited2' => 'Visited2',
            'visited3' => 'Visited3',
            'studyArea' => 'Study Area',
            'visited2nd' => 'Visited2nd',
            'res_status1' => 'Resident status 1',
            'res_status2' => 'Resident status 2',
            'res_status3' => 'Resident status 3',
            'reason_notconsented' => 'Reason not consented',
            'names' => 'Names'
        ];
    }
    
    function validateVisit1 ($attribute, $params){
        $now = new \DateTime();
        $datevisit1 = new \DateTime($this->date_visit1);
        if($datevisit1 > $now){
            $this->addError($attribute, "The date visit one cannot be in future, not realistic");
        }
    }
    
      function validateVisit2 ($attribute, $params){
        $now = new \DateTime();
        $datevisit2 = new \DateTime($this->date_visit2);
        if($datevisit2 > $now){
            $this->addError($attribute, "The date visit two cannot be in future, not realistic");
        }
    }
    
     
      function validateVisit3 ($attribute, $params){
        $now = new \DateTime();
        $datevisit3 = new \DateTime($this->date_visit3);
        if($datevisit3 > $now){
            $this->addError($attribute, "The date visit two cannot be in future, not realistic");
        }
    }
    
    function checkifmonday($attribute, $params){
        if(date("w",strtotime($this->appoint_date))==1){
            $this->addError($attribute, "The appointment cannot be on a monday, please select another date");
        }
    }
    
    function checksequence($attribute, $params){
        $datevisit1 = new \DateTime($this->date_visit1);
        $appointmentdate = new \DateTime($this->appoint_date);
        if($datevisit1 > $appointmentdate){
            $this->addError($attribute, "The appointment cannot be before the visit date, not realistic, check the dates ");
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBp24hs()
    {
        return $this->hasOne(Bp24h::className(), ['fk_person' => 'pk_person']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBpSpots()
    {
        return $this->hasMany(BpSpot::className(), ['fk_person' => 'pk_person']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestionnaires()
    {
        return $this->hasMany(Questionnaire::className(), ['fk_person' => 'pk_person']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUrines()
    {
        return $this->hasMany(Urine::className(), ['fk_person' => 'pk_person']);
    }
    
    public static function athropometrics($id){  
        
        return Html::a('Anthrop', ['/participant/index'],['class'=>'btn btn-sm btn-info']);
    }
    
     public function build_calendar($month,$year){
        $daysOfWeek  = array('S', 'M','T','W','T','F', 'S');
        $firstDayOfMonth = mktime(0,0,0,$month,1,$year);


        $numberDays = date('t',$firstDayOfMonth);
        $dateComponents = getdate($firstDayOfMonth);
        $monthName = $dateComponents['month'];
        $dayOfWeek = $dateComponents['wday'];

        $calendar = "<table class='table table-bordered calendar' cellpadding='22'>";
        $calendar .= "<caption class='text-danger'>$monthName $year</caption>";
        $calendar .= "<tr>";

        foreach($daysOfWeek as $day) {
            $calendar .= "<th class='header'>$day</th>";
        } 

        $currentDay = 1;

        $calendar .= "</tr><tr>";

        if ($dayOfWeek > 0) { 
                $calendar .= "<td colspan='$dayOfWeek'>&nbsp;</td>"; 
        }

        $month = str_pad($month, 2, "0", STR_PAD_LEFT);

        while ($currentDay <= $numberDays) {


        if ($dayOfWeek == 7) {

             $dayOfWeek = 0;
             $calendar .= "</tr><tr>";

        }

        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);

        $date = "$year-$month-$currentDayRel";
        $records = $this->countRecords($date);
        
        $combined = $date."/".$records;
        if($records==0){
            $records="";
        }else{
            $records = $records." apts";
        }
        
        $calendar .= "<td class='day' onClick=getRevists('$combined') >$currentDay <br><small><b><span class='recordapt text-primary'> $records</span></b></small></td>";

        // Increment counters

        $currentDay++;
        $dayOfWeek++;

        }

        // Complete the row of the last week in month, if necessary

        if ($dayOfWeek != 7) { 

             $remainingDays = 7 - $dayOfWeek;
             $calendar .= "<td colspan='$remainingDays'>&nbsp;</td>"; 

        }

        $calendar .= "</tr>";

        $calendar .= "</table>";

        return $calendar;
    }
    
    function countRecords($date){
        $data = Participant::find()
                    ->where(['appoint_date'=>$date])
                    ->andWhere('filtered IS NULL')
                ->andWhere('appoint_level < 3 OR appoint_level IS NULL')
                ->andWhere('consent IS NULL')
                ->count();
        return $data;
    }
}
