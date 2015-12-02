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

    <?php $form = ActiveForm::begin(['id'=>'urinebasic']); ?>
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
  <div class="panel-heading"><div class="panel-title">Urine basics</div></div>
    <div class="panel-body">
        <div id="kbdm"><kbd>Study No : <small><?= $persondetails->study_no;?></small>    Names : <small><?= $persondetails->names;?></small> PID : <small><?= $persondetails->pk_person;?></small>      DOB : <small><?= date("d/m/Y", strtotime($persondetails->dob));?></small>     Gender : <small><?= $persondetails->sex;?></small>      From : <small><?= $persondetails->sublocn;?></small>    Sub loc: <small><?= $persondetails->sublocn;?></small> </kbd></div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">

        <?= $form->field($model, 'date_visit')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd','options'=>['class'=>'form-control'],'clientOptions' => ['changeMonth' => true,'changeYear' => true,'maxDate' => 'today',]])?> 

        <?= $form->field($model, 'time_visit')->widget(TimePicker::classname(), []);?>

        <?= $form->field($model, 'spot_urine_collected')->dropDownList($yesno, ['prompt'=>'--Please select--', 'onChange'=>'disableInputs($(this).val())']) ?>

        <?= $form->field($model, 'spot_urine_time')->widget(TimePicker::classname(), []);?>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">

        <?= $form->field($model, 'sample_labelled')->dropDownList($yesno, ['prompt'=>'--Please select--']) ?>

        <?= $form->field($model, 'tech_initials_r')->dropDownList(app\models\Valuelist::valuelist('techs'), ['prompt'=>'--Please select--']) ?>
    </div>
</div>
</div>
  <input type="hidden" value="<?= $model->date_visit;?>" id="idurinebasic" />
<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success btn-block' : 'btn btn-primary btn-block', 'id'=>'urinebasicsubmit']) ?>
</div>
    <?php ActiveForm::end(); ?>  
</div>

<script>
    $(document).ready(function(){
         var idurinebasic = $("#idurinebasic").val();
        if(idurinebasic != ""){
            $('#urinebasic *').filter(':input').each(function(){
              var ids = $(this).attr('id');
                $("#"+ids).attr("disabled", "disabled");
            });
        }
        $("#urinebasicsubmit").on('click', function(event){
            var spoturine = $("#urine-spot_urine_collected").val(),
            spoturinetime = $("#urine-spot_urine_time").val(),
            aliquots = $("#urine-aliquots").val(),
            samplelabelled = $("#urine-sample_labelled").val(),
            frozen = $("#urine-frozen").val(),
            tech = $("#urine-tech_initials_r").val();
            if(spoturine == 'Yes'){
                if(aliquots == ''){
                    alert("Aliquot cannot be empty");
                    event.preventDefault();
                }else if(spoturinetime == ""){
                    alert("Spot urine time cannot be empty");
                    event.preventDefault();
                }else if(samplelabelled == ""){
                    alert("sample labelled time cannot be empty");
                    event.preventDefault();
                }else if(frozen == ""){
                    alert("frozen labelled time cannot be empty");
                    event.preventDefault();
                }else if(tech == ""){
                    alert("Tech initials receiving cannot be empty");
                    event.preventDefault();
                }
            }
        });
        var urinecollected = $("#urine-spot_urine_collected").val();
        if(urinecollected == 'No'){
            $("#urinebasic *").filter(':input').each(function(){
               var ids = $(this).attr('id');
               if(ids == 'urine-date_visit' || ids == 'urine-time_visit' || ids == 'urine-spot_urine_collected' || ids == 'urinebasicsubmit'){
                   //do nothing
               }else{
                    $("#"+ids).attr("disabled", "disabled");
                    $("#"+ids).val("");
                }
           });
        }
    });
    function disableInputs(val){
       if(val == 'No'){
           $("#urinebasic *").filter(':input').each(function(){
               var ids = $(this).attr('id');
               if(ids == 'urine-date_visit' || ids == 'urine-time_visit' || ids == 'urine-spot_urine_collected' || ids == 'urinebasicsubmit'){
                   //do nothing
               }else{
                    $("#"+ids).attr("disabled", "disabled");
                    $("#"+ids).val("");
                }
           });
       }else if(val == 'Yes'){
           $('#urinebasic *').filter(':input').each(function(){
              var ids = $(this).attr('id');
                $("#"+ids).removeAttr("disabled");
            });
       }
    }
</script>