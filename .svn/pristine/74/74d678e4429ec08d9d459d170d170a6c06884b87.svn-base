<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use kartik\widgets\TimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Blood */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">Blood basic information</h3></div>
    <div class="panel-body">
        
    <div id="kbdm">
        <kbd>Study No : <small><?= $persondetails->study_no;?></small>    Names : <small><?= $persondetails->names;?></small> PID : <small><?= $persondetails->pk_person;?></small>      DOB : <small><?= date("d/m/Y", strtotime($persondetails->dob));?></small>     Gender : <small><?= $persondetails->sex;?></small>      From : <small><?= $persondetails->sublocn;?></small>    Sub loc: <small><?= $persondetails->sublocn;?></small> </kbd>
    </div>
  <div class="blood-form">
    <?php $form = ActiveForm::begin(['id'=>'form-blood']); ?>
    <?php $yesno = ['Yes' => 'Yes','No' => 'No',];
    $aliquots = ['aliquot 1'=>'aliquot 1', 'aliquot 2'=>'aliquot 2'];?>
  <!-- Tab panes -->
  <?= $form->errorSummary($model); ?>
          <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6">
                   <?php $form = ActiveForm::begin(['id'=>'form-blood']); ?>
                    <?php $yesno = ['Yes' => 'Yes','No' => 'No',];?>
                    <?= $form->field($model, 'date_received_blood')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd','options'=>['class'=>'form-control'],'clientOptions' => ['changeMonth' => true,'changeYear' => true,'maxDate' => 'today',]]) ?>
                    <?= $form->field($model, 'time_received_blood')->widget(TimePicker::classname(), []) ?>
                    <?= $form->field($model, 'date_result_spot_blood')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd','options'=>['class'=>'form-control'],'clientOptions' => ['changeMonth' => true,'changeYear' => true,'maxDate' => 'today',]]) ?>
                    <?= $form->field($model, 'time_result_spot_blood')->widget(TimePicker::classname(), []) ?>
                    <?= $form->field($model, 'tech_initial')->dropDownList(app\models\Valuelist::valuelist('techs'), ['prompt'=>'--Please select--']) ?>
                    <?= $form->field($model, 'sickle_type')->textInput() ?>
                    <?= $form->field($model, 'alpha_thela')->textInput() ?>
                    <?= $form->field($model, 'HbA1c')->textInput() ?>
                    <?= $form->field($model, 'na')->textInput() ?>
                  
                  <label>Genotype</label>
                  <div class="row">
                        <div class="col-md-3"><?= $form->field($model,'genaliquot1')->checkbox(); ?> </div>
                        <div class="col-md-3"><?= $form->field($model,'genaliquot2')->checkbox(); ?> </div>
                    </div>
                  
                  <label>FBC</label>
                  <div class="row">
                        <div class="col-md-3 col-sm-3"><?= $form->field($model,'fbcaliquot1')->checkbox(); ?> </div>
                        <div class="col-md-3 col-md-3"><?= $form->field($model,'fbcaliquot2')->checkbox(); ?> </div>
                    </div>
                   <?= $form->field($model, 'sample_labelled_lab')->dropDownList($yesno, ['prompt'=>'--Please select--']);?>
                  
                    <?= $form->field($model, 'frozen')->dropDownList($yesno, ['prompt'=>'--Please select--']) ?>

              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
                <table class="table table-bordered">
                    <thead><th></th> <th>WBC</th> <th>HB</th><th>RBC</th><th>MCV</th><th>MCHC</th><th>RDW</th><th>PLT</th></thead>
                    <tr><td>Haemogram</td><td><?= $form->field($model, 'wbc')->textInput()->textInput()->label(false) ?></td><td><?= $form->field($model, 'hb')->textInput()->textInput()->label(false) ?></td><td><?= $form->field($model, 'rbc')->textInput()->textInput()->label(false) ?></td><td><?= $form->field($model, 'mcv')->textInput()->textInput()->label(false) ?></td><td><?= $form->field($model, 'mchc')->textInput()->textInput()->label(false) ?></td><td><?= $form->field($model, 'rdw')->textInput()->textInput()->label(false) ?></td><td><?= $form->field($model, 'plt')->textInput()->textInput()->label(false) ?></td></tr>
                </table>
                
                 <?= $form->field($model, 'k')->textInput()->textInput() ?>
                 <?= $form->field($model, 'urea')->textInput()->textInput() ?>
                 <?= $form->field($model, 'cr')->textInput()->textInput() ?>
                 <?= $form->field($model, 'chloride')->textInput()->textInput() ?>
                 <?= $form->field($model, 'angiopoietin2')->textInput()->textInput() ?>
                  <?= $form->field($model, 'tech_initial2')->dropDownList(app\models\Valuelist::valuelist('techs'), ['prompt'=>'--Please select--']) ?>
               
                <?= $form->field($model, 'tech_date')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd','options'=>['class'=>'form-control'],'clientOptions' => ['changeMonth' => true,'changeYear' => true,'maxDate' => 'today',]]);?>

                <?= $form->field($model, 'tech_time')->widget(TimePicker::classname(), []) ?>
              </div>
          </div>  
     </div> 
        <input type="hidden" value="<?php echo $model->date_received_blood;?>" id="datereceiveblood" />
         <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>
           </div> 
   </div> 
<style>
    .hasDatepicker{
        z-index: 999999;
        position: relative;
    }
</style>
<script>
    $(document).ready(function(){
       /* var datereceiveblood = $("#datereceiveblood").val();
        if(datereceiveblood != ""){
            $('#form-blood *').filter(':input').each(function(){
              var ids = $(this).attr('id');
                $("#"+ids).attr("disabled", "disabled");
            });
        }*/
    });
</script>