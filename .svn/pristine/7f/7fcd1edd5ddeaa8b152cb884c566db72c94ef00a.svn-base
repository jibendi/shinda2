<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\db\QueryInterface;

/**
 * This is the model class for table "{{%bp_24h}}".
 *
 * @property integer $idbp24
 * @property integer $fk_study_no
 * @property integer $fk_person
 * @property string $date_abpm_started
 * @property string $time_abpm_start
 * @property string $time_abpm_end
 * @property integer $leaflet_given
 * @property integer $diary_given
 * @property string $time_bed
 * @property string $time_woke
 * @property integer $succ_readings
 * @property string $serial_no_abpm
 * @property integer $diary_collected
 * @property integer $wasuploaded
 *
 * @property MonitoringBp24Data[] $monitoringBp24Datas
 */
class Bp24h extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    
    public static function tableName()
    {
        return '{{%bp_24h}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fk_person', 'date_abpm_started', 'time_abpm_start', 'time_abpm_end', 'leaflet_given', 'diary_given', 'time_bed', 'time_woke', 'serial_no_abpm', 'diary_collected', 'wasuploaded'], 'required'],
            [['fk_study_no', 'fk_person',  'succ_readings', 'wasuploaded'], 'integer'],
            [['date_abpm_started', 'time_abpm_start', 'time_abpm_end', 'time_bed', 'time_woke', 'altered', 'creation_name', 'creation_time'], 'safe'],
            [['serial_no_abpm'], 'string', 'max' => 25],
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'xlsx'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idbp24' => 'Idbp24',
            'fk_person' => 'PID',
            'date_abpm_started' => 'Date Abpm Started',
            'time_abpm_start' => 'Time Abpm Start',
            'time_abpm_end' => 'Time Abpm End',
            'leaflet_given' => 'Leaflet Given',
            'diary_given' => 'Diary Given',
            'time_bed' => 'Time Bed',
            'time_woke' => 'Time Woke',
            'succ_readings' => 'Succ Readings',
            'serial_no_abpm' => 'Serial No Abpm',
            'diary_collected' => 'Diary Collected',
            'wasuploaded' => 'Wasuploaded',
            'file' => 'Uplaod the excel file'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMonitoringBp24Datas()
    {
        return $this->hasMany(MonitoringBp24Data::className(), ['fk_id24h' => 'idbp24']);
    }
    
     public function getPersondetails()
    {
        return $this->hasOne(Participant::className(), ['pk_person' => 'fk_person']);
    }


   public function pull24hoursdata($id){
          $query = Monitoringbp24data::find()->where(['fk_id24h'=>$id]);
                $provider = new ActiveDataProvider([
                    'query' => $query,
                    'pagination' => [
                        'pageSize' => 10,
                    ],
                 
                ]);
                return $provider;
}
}
