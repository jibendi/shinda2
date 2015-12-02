<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%valuelist}}".
 *
 * @property integer $id
 * @property string $type
 * @property string $value
 * @property string $index
 * @property integer $status
 */
class Valuelist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%valuelist}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'value'], 'required'],
            [['status'], 'integer'],
            [['type'], 'string', 'max' => 25],
            [['value'], 'string', 'max' => 30],
            [['index'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'value' => 'Value',
            'index' => 'Index',
            'status' => 'Status',
        ];
    }
    
     static function valuelist($type=''){
        $values= Valuelist::find()->where(['type'=>$type])->orderBy('index')->all();
       return $listData= \yii\helpers\ArrayHelper::map($values, 'index','value' );
    }
}
