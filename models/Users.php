<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_users".
 *
 * @property integer $id
 * @property string $name1
 * @property string $name2
 * @property string $name3
 * @property string $username
 * @property string $password
 * @property integer $userlevel
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name1', 'name2', 'name3', 'username'], 'required'],
            [['username'], 'unique'],
            [['name1', 'name2', 'name3', 'username'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name1' => 'Name1',
            'name2' => 'Name2',
            'name3' => 'Name3',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }
}
