<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%study_no}}".
 *
 * @property integer $id
 * @property string $study_no
 * @property integer $active
 */
class Studyno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%study_no}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active'], 'integer'],
            [['study_no'], 'string', 'max' => 11]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'study_no' => 'Study No',
            'active' => 'Active',
        ];
    }
}
