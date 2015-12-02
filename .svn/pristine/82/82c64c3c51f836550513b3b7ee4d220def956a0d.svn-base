<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%blood}}".
 *
 * @property integer $id
 * @property integer $fk_person
 * @property string $blood_collected
 * @property string $reason_blood_not_collected
 * @property string $date_collect_blood
 * @property string $time_blood_collected
 * @property string $sample_labelled
 * @property string $genotype_aliquots
 * @property string $fbc_aliquots
 * @property string $elisa_aliquots
 * @property string $shinda_labels
 * @property string $frozen
 * @property string $fw_visit1
 * @property string $date_visit
 * @property string $time_visit
 * @property string $date_received_blood
 * @property string $time_received_blood
 * @property string $date_result_spot_blood
 * @property string $time_result_spot_blood
 * @property string $sickle_type
 * @property string $alpha_thela
 * @property integer $wbc
 * @property integer $hb
 * @property integer $rbc
 * @property integer $mcv
 * @property integer $mchc
 * @property integer $rdw
 * @property integer $plt
 * @property double $na
 * @property double $k
 * @property double $cr
 * @property double $urea
 * @property double $chloride
 * @property double $angiopoietin2
 * @property double $HbA1c
 * @property string $tech_initial
 * @property string $tech_date
 * @property string $tech_time
 *
 * @property Participant $fkPerson
 */
class Blood extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%blood}}';
    }

    /**
     * @inheritdoc
     */
    public $fbcaliquot1;
    public $fbcaliquot2;
    public $genaliquot1;
    public $genaliquot2;
    public function rules()
    {
        return [
            [['fk_person', 'blood_collected'], 'required'],
            [['wbc', 'hb', 'rbc', 'mcv', 'mchc', 'rdw', 'plt'], 'double'],
            [['date_collect_blood', 'time_blood_collected', 'date_visit', 'time_visit', 'date_received_blood', 'time_received_blood', 'date_result_spot_blood', 'time_result_spot_blood', 'tech_date', 'tech_time', 'altered', 'tech_initial2', 'sample_labelled_lab', 'creation_name', 'creation_time'], 'safe'],
            [['na', 'k', 'cr', 'urea', 'chloride', 'angiopoietin2', 'HbA1c'], 'double'],
            [['blood_collected', 'sickle_type', 'alpha_thela'], 'string', 'max' => 11],
            [['reason_blood_not_collected'], 'string', 'max' => 40],
            [['sample_labelled', 'genotype_aliquots', 'fbc_aliquots', 'elisa_aliquots', 'shinda_labels', 'frozen', 'tech_initial'], 'string', 'max' => 20],
            [['fw_visit1'], 'string', 'max' => 15],
            [['HbA1c'], 'integer', 'min'=>1, 'max'=>20],
           // [['na'], 'integer', 'min'=>3],
            //[['k'], 'integer', 'min'=>2],
            //[['cr'], 'integer', 'min'=>3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fk_person' => 'PID',
            'blood_collected' => 'Blood Collected',
            'reason_blood_not_collected' => 'Reason Blood Not Collected',
            'date_collect_blood' => 'Date Collect Blood',
            'time_blood_collected' => 'Time Blood Collected',
            'sample_labelled' => 'Sample Labelled',
            'genotype_aliquots' => 'Genotype Aliquots',
            'fbc_aliquots' => 'Fbc Aliquots',
            'elisa_aliquots' => 'Elisa Aliquots',
            'shinda_labels' => 'Shinda Labels',
            'frozen' => 'Frozen',
            'fw_visit1' => 'Fw Visit1',
            'date_visit' => 'Date Visit',
            'time_visit' => 'Time Visit',
            'date_received_blood' => 'Date Received Blood',
            'time_received_blood' => 'Time Received Blood',
            'date_result_spot_blood' => 'Date Result Spot Blood',
            'time_result_spot_blood' => 'Time Result Spot Blood',
            'sickle_type' => 'Sickle Type',
            'alpha_thela' => 'Alpha Thal',
            'wbc' => 'Wbc',
            'hb' => 'Hb',
            'rbc' => 'Rbc',
            'mcv' => 'Mcv',
            'mchc' => 'Mchc',
            'rdw' => 'Rdw',
            'plt' => 'Plt',
            'na' => 'Na',
            'k' => 'K',
            'cr' => 'Cr',
            'urea' => 'Urea',
            'chloride' => 'Chloride',
            'angiopoietin2' => 'Angiopoietin2',
            'HbA1c' => 'Hb A1c(%)',
            'tech_initial' => 'Tech Initial',
            'tech_date' => 'Tech Date',
            'tech_time' => 'Tech Time',
            'fbcaliquot1' => 'Aliquot 1',
            'fbcaliquot2' => 'Aliquot 2',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkPerson()
    {
        return $this->hasOne(Participant::className(), ['pk_person' => 'fk_person']);
    }
    
    public function runDaily(){
        $connection = \Yii::$app->db;
        $tables = $connection->schema->getTableNames();
        foreach ($tables as  $value) {
            $this->outFileUpdatedData($value);
        }
    }
    
    public function outFileUpdatedData($tablename){
        $db = \Yii::$app->db;
        $data = trim("C:\\backup\\" . $tablename .".txt");
        if(file_exists($data)){ 
           unlink($data);
        }
        $file = "../../../../backup/$tablename.txt";
        $sql = "SELECT * INTO OUTFILE '$file' FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"'  LINES TERMINATED BY '\n'  FROM $tablename";
        $db->createCommand($sql)->execute();
    }
    
    public function restoredata(){
        $connection = \Yii::$app->db;
        $tables = $connection->schema->getTableNames();
        foreach ($tables as  $value) {
            $this->uploadData($value);
        }
    }
    
    public function uploadData($tablename){
        $db = \Yii::$app->db;
        $sql1 = "TRUNCATE TABLE $tablename";
        $db->createCommand($sql1)->queryAll(); 
        $file = "uploads/$tablename.txt";
        $sql2 = "LOAD DATA INFILE '$file' INTO TABLE $tablename FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"'  LINES TERMINATED BY '\n'";
        $db->createCommand($sq2)->queryAll();     
    }
}
