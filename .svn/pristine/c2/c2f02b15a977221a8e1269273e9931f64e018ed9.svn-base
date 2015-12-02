<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%urine}}".
 *
 * @property integer $id
 * @property integer $fk_person
 * @property string $date_visit
 * @property string $time_visit
 * @property integer $spot_urine_collected
 * @property integer $reason_not_collected
 * @property string $date_collect_urine
 * @property string $date_received_urine
 * @property string $time_received_urine
 * @property string $date_result_spot_urine
 * @property string $time_result_spot_urine
 * @property double $spot_na_urine
 * @property double $spot_k_urine
 * @property double $spot_cr_urine
 * @property double $spot_alb_urine
 * @property string $year
 * @property string $clinician
 * @property integer $result_complete
 * @property string $aliquots
 * @property string $sample_labelled
 * @property string $frozen
 * @property string $tech_initials_r
 * @property string $tech_date_r
 * @property string $tech_time_r
 * @property string $tech_initials_p
 * @property string $tech_date_p
 * @property string $tech_time_p
 *
 * @property Participant $fkPerson
 */
class Urine extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $aliquot1;
    public $aliquot2;
    public static function tableName()
    {
        return '{{%urine}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fk_person', 'date_visit', 'time_visit', 'spot_urine_collected', 'date_collect_urine', 'date_received_urine', 'spot_na_urine', 'spot_k_urine', 'spot_cr_urine', 'spot_alb_urine', 'tech_initials_p'], 'required'],
            [['fk_person', 'reason_not_collected', 'result_complete'], 'integer'],
            [['date_visit', 'time_visit', 'date_collect_urine', 'date_received_urine', 'time_received_urine', 'date_result_spot_urine', 'time_result_spot_urine', 'year', 'tech_date_r', 'tech_time_r', 'tech_date_p', 'tech_time_p', 'aliquots', 'spot_urine_collected', 'altered', 'sample_labelled_lab'], 'safe'],
            [['spot_na_urine', 'spot_k_urine', 'spot_cr_urine', 'spot_alb_urine'], 'number'],
            [['clinician'], 'string', 'max' => 15],
            [['sample_labelled', 'frozen', 'tech_initials_r', 'tech_initials_p'], 'string', 'max' => 3]
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
            'date_visit' => 'Date Visit',
            'time_visit' => 'Time Visit',
            'spot_urine_collected' => 'Spot Urine Collected',
            'reason_not_collected' => 'Reason Not Collected',
            'date_collect_urine' => 'Date collected',
            'date_received_urine' => 'Date received',
            'time_received_urine' => 'Time Received ',
            'date_result_spot_urine' => 'Date Result Spot Urine',
            'time_result_spot_urine' => 'Time Result Spot Urine',
            'spot_na_urine' => 'Spot Na Urine',
            'spot_k_urine' => 'Spot K Urine',
            'spot_cr_urine' => 'Spot Cr Urine',
            'spot_alb_urine' => 'Spot Alb Urine',
            'year' => 'Year',
            'clinician' => 'Clinician',
            'result_complete' => 'Result Complete',
            'aliquots' => 'Aliquots',
            'sample_labelled' => 'Sample Labelled',
            'frozen' => 'Frozen',
            'tech_initials_r' => 'Tech Initials R',
            'tech_date_r' => 'Tech Date R',
            'tech_time_r' => 'Tech Time R',
            'tech_initials_p' => 'Tech Initials P',
            'tech_date_p' => 'Tech Date P',
            'tech_time_p' => 'Tech Time P',
            'aliquot1' => 'Aliquot 1',
            'aliquot2' => 'Aliquot 2',
            'sample_labelled_lab' => 'Sample labelled'
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
