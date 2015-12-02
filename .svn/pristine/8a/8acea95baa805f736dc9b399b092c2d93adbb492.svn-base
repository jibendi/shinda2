<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%monitoring_bp_24_data}}".
 *
 * @property integer $id_monitor
 * @property string $time
 * @property integer $SBPbr
 * @property integer $dia
 * @property integer $pulse
 * @property integer $SBPao
 * @property double $AIXao
 * @property double $AIXbr
 * @property double $PWVao
 * @property double $PWVsd
 * @property integer $fk_person
 * @property string $date_creation
 * @property integer $fk_id24h
 * @property integer $fk_study_no
 * @property string $comments
 *
 * @property Bp24h $fkId24h
 */
class Monitoringbp24data extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%monitoring_bp_24_data}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time', 'fk_person', 'date_creation', 'fk_id24h'], 'required'],
            [['time', 'date_creation','altered'], 'safe'],
            [['SBPbr', 'dia', 'pulse', 'SBPao', 'fk_person', 'fk_id24h', 'fk_study_no'], 'integer'],
            [['AIXao', 'AIXbr', 'PWVao', 'PWVsd'], 'number'],
            [['comments'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_monitor' => 'Id Monitor',
            'time' => 'Time',
            'SBPbr' => 'Sbpbr',
            'dia' => 'Dia',
            'pulse' => 'Pulse',
            'SBPao' => 'Sbpao',
            'AIXao' => 'Aixao',
            'AIXbr' => 'Aixbr',
            'PWVao' => 'Pwvao',
            'PWVsd' => 'Pwvsd',
            'fk_person' => 'Fk Person',
            'date_creation' => 'Date Creation',
            'fk_id24h' => 'Fk Id24h',
            'fk_study_no' => 'Fk Study No',
            'comments' => 'Comments',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkId24h()
    {
        return $this->hasOne(Bp24h::className(), ['idbp24' => 'fk_id24h']);
    }
}
