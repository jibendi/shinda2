<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use kartik\widgets\TimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Urine */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
    .hasDatepicker{
        z-index: 999999;
        position: relative;
    }
</style>

    <?php $form = ActiveForm::begin(); ?>
<?php
    $yesno = [
        'Yes' => 'Yes',
        'No' => 'No',
    ];
    $aliquot = [
        'Aliquot 1' => 'Aliquot 1',
        'Aliquot 2' => 'Aliquot 2',
    ]
?>
<div class="panel panel-primary">
  <div class="panel-heading"><div class="panel-title">Urine results</div></div>
    <div class="panel-body">
        <div id="kbdm">
            <kbd>Study No : <small><?= $persondetails->study_no;?></small>     PID : <small><?= $persondetails->pk_person;?></small>      DOB : <small><?= date("d/m/Y", strtotime($persondetails->dob));?></small>     Gender : <small><?= $persondetails->sex;?></small>      From : <small><?= $persondetails->sublocn;?></small>    Sub loc: <small><?= $persondetails->sublocn;?></small> </kbd>
        </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <?= $form->field($model, 'date_collect_urine')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd','options'=>['class'=>'form-control'],'clientOptions' => ['changeMonth' => true,'changeYear' => true,'maxDate' => 'today',]])?>
                                    <?= $form->field($model, 'date_received_urine')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd','options'=>['class'=>'form-control'],'clientOptions' => ['changeMonth' => true,'changeYear' => true,'maxDate' => 'today',]])?>
                                    <?= $form->field($model, 'time_received_urine')->widget(TimePicker::classname(), []);?>
                                    
                                    <?= $form->field($model, 'spot_na_urine')->textInput() ?>
                                    
                                    
        
         <label>Aliquots</label>
        <div class="row">
              <div class="col-md-3"><?= $form->field($model,'aliquot1')->checkbox(); ?> </div>
              <div class="col-md-3"><?= $form->field($model,'aliquot2')->checkbox(); ?> </div>
        </div>
                                    
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <?= $form->field($model, 'spot_k_urine')->textInput() ?>
                                    <?= $form->field($model, 'spot_cr_urine')->textInput() ?>
                                    <?= $form->field($model, 'spot_alb_urine')->textInput() ?>
                                    <?= $form->field($model, 'sample_labelled_lab')->dropDownList($yesno, ['prompt'=>'--Please select--']) ?>
                                    

        <?= $form->field($model, 'frozen')->dropDownList($yesno, ['prompt'=>'--Please select--']) ?>
                                    <?= $form->field($model, 'tech_initials_p')->dropDownList(app\models\Valuelist::valuelist('techs'), ['prompt'=>'--Please select--']) ?>
                                </div>
                                 
                               </div> 
        </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success btn-block' : 'btn btn-primary btn-block']) ?>
    </div>
        <?php ActiveForm::end(); ?>  
    </div>