<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%fragments}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $data_upload
 */
class Fragments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%fragments}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['data_upload'], 'integer'],
            [['name'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Computer name',
            'data_upload' => 'Data Upload',
        ];
    }
    
    public function listComputers(){
        $model = \yii\helpers\ArrayHelper::map($this->find()->all(), 'id', 'name');
        return $model;
    }
    
    public function getdata(){
        $tables = [ 'participant', 'blood','bp_24h', 'bp_spot', 'monitoring_bp_24_data', 'questionnaire', 'urine'];
         
        
        foreach ($tables as $value) {
            $this->getremotedata($value);
        }
        
        return true;
    }
    
    public function getremotedata($table){
        $db = \Yii::$app->db;
        $sql = "SELECT * FROM tbl_".$table." WHERE altered = 1";
        $data = $db->createCommand($sql) //convert it to array to speend up the process
            ->queryAll();
        
        if($table == 'participant'){
             $this->updateData($data, $table);
        }else{
            $this->insertData($data, $table);  
        }   
    }
    
    public function updateData($data, $tables){
        $db = new yii\db\Connection([
            'dsn' => "mysql:host=196.202.202.131;dbname=shinda2",
            'username' => 'root',
            'password' => 'FAQU',
            'charset' => 'utf8',
        ]);
        $table = "tbl_".$tables;
        $columns = $db->getTableSchema($table)->columnNames;
        $sqls = "";
        foreach ($data as $value) {
            $sql = "UPDATE $table SET ";
            for ($index=1;$index < count($columns); $index++){
                 $model = Participant::findOne($columns[0]);
                 $col = $columns[$index];
                 $hold = $value[$columns[$index]];
                 if(empty($hold)){
                     $val = "NULL";
                 }else{
                      $val = "'$hold'";
                 }
                 $sql .="$col = $val, ";   
            } 
            $sql = substr($sql, 0, -2);
            $id = $value[$columns[0]];
            $sql .=" WHERE id_p =$id;";
            $sqls .=$sql;
        }
        $db->createCommand($sqls)->execute();
        $db->createCommand()->update('tbl_participant', ['altered' => NULL])->execute();
        
    }
    
    public function insertData($data, $tables){
        $db = new yii\db\Connection([
            'dsn' => "mysql:host=196.202.202.131;dbname=shinda2",
            'username' => 'root',
            'password' => 'FAQU',
            'charset' => 'utf8',
        ]);
        $table = "tbl_".$tables;
        $columns = Yii::$app->db->getTableSchema($table)->columnNames;
        $sqls = "";
        foreach ($data as $value) {
            $sql = "INSERT INTO $table (";
            $values = "";
            for($index =1;$index < count($columns);$index++){
                $col = $columns[$index];
                $vals = $value[$columns[$index]];
                if(empty($vals)){
                    $val = "NULL";
                }else{
                     $val = "\"$vals\"";
                }
                $sql.= $col.", ";
                $values .= $val.", ";
            } 
            $values = substr($values, 0, -2);
            $sql = substr($sql, 0, -2);
            $sql.=") VALUES(";
            $sql .=$values.");";
             $sqls .= $sql;
        }
        $db->createCommand($sqls) 
        ->execute();
        $db->createCommand()->update($table, ['altered' => NULL])->execute();
        return true;
    }
    
    public function pushparticpants(){
        $dbs = new \yii\db\Connection([
            'dsn' => "mysql:host=196.202.202.131;dbname=shinda2",
            'username' => 'root',
            'password' => 'FAQU',
            'charset' => 'utf8',
        ]);
        
        $data = $dbs->createCommand("SELECT * FROM tbl_participant") 
                ->queryAll();
       $columns = $dbs->getTableSchema('tbl_participant')->columnNames;
       $db =  \Yii::$app->db;
       $trunc = "SET FOREIGN_KEY_CHECKS = 0;TRUNCATE tbl_participant;";
       $db->createCommand($trunc) 
        ->execute();
       $db->createCommand()->update('tbl_blood', ['altered' => NULL])->execute();
       $db->createCommand()->update('tbl_bp_24h', ['altered' => NULL])->execute();
       $db->createCommand()->update('tbl_bp_spot', ['altered' => NULL])->execute();
       $db->createCommand()->update('tbl_monitoring_bp_24_data', ['altered' => NULL])->execute();
       $db->createCommand()->update('tbl_questionnaire', ['altered' => NULL])->execute();
       $db->createCommand()->update('tbl_urine', ['altered' => NULL])->execute();
        
        $sqls = "";
        foreach ($data as $value) {
            $sql = "INSERT INTO tbl_participant (";
            $values ="";
            for($index =0;$index < count($columns);$index++){
                $col = $columns[$index];
                $vals = $value[$columns[$index]];
                if(empty($vals)){
                    $val = "NULL";
                }else{
                     $val = "\"$vals\"";
                }
                $sql.= $col.", ";
                $values .= $val.", ";
            } 
            $values = substr($values, 0, -2);
            $sql = substr($sql, 0, -2);
            $sql.=") VALUES(";
            $sql .=$values.");";
             $sqls .= $sql;
        }
        $db->createCommand($sqls) 
        ->execute();
        return true;
    }
    
}
