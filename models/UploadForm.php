<?php

namespace app\models;

use yii\base\Model;

class UploadForm extends Model
{
    /**
     * @var artiograph
     */
    public $excelfile;

    public function rules()
    {
        return [
            [['artiograph'], 'file', 'skipOnEmpty' => false, 'extensions' => 'xlsx'],
        ];
    }
    
    public function upload()
    {
        //if ($this->validate()) {
        echo $this->excelfile->extension;
        exit();
            $this->excelfile->saveAs('uploads/' . $this->excelfile->baseName . '.' . $this->excelfile->extension);
            return true;
        /*} else {
            return false;
        }*/
    }
}