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
              <div class="col-lg-6 col-md-6 col-sm-6">
                  
                <?= $form->field($model, 'blood_collected')->dropDownList($yesno, ['prompt'=>'--Please select--', 'onChange' => 'disableEntireForm($(this).val())']);?>

                  <span class="reasonbloodnotcollect hide"><?= $form->field($model, 'reason_blood_not_collected')->dropDownList(app\models\Valuelist::valuelist('bloodnotcollected'), ['prompt'=>'--Please select--']) ?></span>

                <?= $form->field($model, 'date_collect_blood')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd','options'=>['class'=>'form-control'],'clientOptions' => ['changeMonth' => true,'changeYear' => true,'maxDate' => 'today',]])?> 

                <?= $form->field($model, 'time_blood_collected')->widget(TimePicker::classname(), []);?>

                <?= $form->field($model, 'sample_labelled')->dropDownList($yesno, ['prompt'=>'--Please select--']);?>

                
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">

                    <?= $form->field($model, 'shinda_labels')->dropDownList($yesno, ['prompt'=>'--Please select--']) ?>

                    <?= $form->field($model, 'date_visit')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd','options'=>['class'=>'form-control'],'clientOptions' => ['changeMonth' => true,'changeYear' => true,'maxDate' => 'today',]])?> 

                    <?= $form->field($model, 'time_visit')->widget(TimePicker::classname(), []);?>
              </div>
          </div>
      </div>
<input type="hidden" value="<?php echo $model->blood_collected;?>" id="idbloodresults"/>
      <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary btn-block', 'id'=>'bloodbasic']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </div>

<style>
    .hasDatepicker{
        z-index: 999999;
        position: relative;
    }
</style>
<script>
    $(document).ready(function(){
         var idbloodresults = $("#idbloodresults").val();
        if(idbloodresults != ""){
            $('#form-blood *').filter(':input').each(function(){
              var ids = $(this).attr('id');
                $("#"+ids).attr("disabled", "disabled");
            });
        }
        $("#bloodbasic").on('click', function(event){
            var blodcollected = $("#blood-blood_collected").val(),
            rsnnotcollected = $("#blood-reason_blood_not_collected").val(),
            datebloodcollect = $("#blood-date_collect_blood").val(),
            timebloodcollect = $("#blood-time_blood_collected").val(),
            samplelabelled = $("#blood-sample_labelled").val(),
            genotype = $("#blood-genotype_aliquots").val(),
            fbc = $("#blood-fbc_aliquots").val(),
            elisa = $("#blood-elisa_aliquots").val(),
            frozen = $("#blood-frozen").val(),
            datevisiti = $("#blood-date_visit").val(),
            timevisit = $("#blood-time_visit").val();
            if(blodcollected == 'No' && rsnnotcollected == ''){
                alert("Please select the reason");
                event.preventDefault();
            }else if(blodcollected == 'Yes'){
                if(datebloodcollect ==""){
                    alert("Date blood collect cannot be empty");
                    event.preventDefault();
                }else if(timebloodcollect ==""){
                    alert("Time blood collect cannot be empty");
                    event.preventDefault();
                }else if(samplelabelled ==""){
                    alert("Sample labelled cannot be empty");
                    event.preventDefault();
                }else if(genotype ==""){
                    alert("Genotype cannot be empty");
                    event.preventDefault();
                }else if(fbc ==""){
                    alert("FBC cannot be empty");
                    event.preventDefault();
                }else if(elisa ==""){
                    alert("elisa cannot be empty");
                    event.preventDefault();
                }else if(frozen ==""){
                    alert("frozen cannot be empty");
                    event.preventDefault();
                }else if(datevisiti ==""){
                    alert("datevisiti cannot be empty");
                    event.preventDefault();
                }else if(timevisit ==""){
                    alert("timevisit cannot be empty");
                    event.preventDefault();
                }
            }
        });
       /* var bloodcollected = $("#blood-blood_collected").val();
        if(bloodcollected == "No"){
            $(".reasonbloodnotcollect").removeClass('hide');
            $('#form-blood *').filter(':input').each(function(){
              var ids = $(this).attr('id');
                if(ids == "blood-blood_collected" || ids == "blood-reason_blood_not_collected"){
                    //do nothing
                }else{
                    $("#"+ids).attr("disabled", "disabled");
                    $("#"+ids).val("");
                }
            });
        }*/
    });
    
    function disableEntireForm(val){
        if(val == "No"){
            $(".reasonbloodnotcollect").removeClass('hide');
            $('#form-blood *').filter(':input').each(function(){
              var ids = $(this).attr('id');
                if(ids == "blood-blood_collected" || ids == "blood-reason_blood_not_collected"){
                    //do nothing
                }else{
                    $("#"+ids).attr("disabled", "disabled");
                    $("#"+ids).val("");
                }
            });
        }else{
            $(".reasonbloodnotcollect").addClass('hide');
             $('#form-blood *').filter(':input').each(function(){
              var ids = $(this).attr('id');
                $("#"+ids).removeAttr("disabled");
            });
        }
    }
</script>