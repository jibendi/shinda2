<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%counties}}".
 *
 * @property integer $id
 * @property string $name
 */
class Counties extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%counties}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }
    
    static function getcounties(){
        $data = \yii\helpers\ArrayHelper::map(Counties::find()->all(), 'id', 'name');
        return $data;
    }
}
