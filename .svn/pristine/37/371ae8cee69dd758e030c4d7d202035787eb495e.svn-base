<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Participant */
/* @var $form yii\widgets\ActiveForm */
$this->title = "Names: ".$model->names.":  Gender: ".$model->sex." DOB: ".date("m/d/Y", strtotime($model->dob));
?>
<div class="panel panel-primary">
    
  <div class="panel-heading">
    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
  </div>
<div class="panel-body">
<div class="participant-form">

    <?php $form = ActiveForm::begin(['enableAjaxValidation'=>true]); ?>
    
    <?= $form->errorSummary($model);?>

    <?php $list = [
        'Present' => 'Present',
        'Out Migrated' => 'Out Migrated',
        'Not at Home' => 'Not at Home',
        'Await Husband Decision' => 'Await Husband Decision',
        'Guardian Not Present' => 'Guardian Not Present',
        'Died' => 'Died',
        'Not Known' => 'Not Known',
    ];?>
    <?= $form->field($model, 'res_status1')->dropDownList($list, ['prompt'=>'--Please select--', 'onChange'=>'checkAppointment($(this).val())']) ?>
    
    <?= $form->field($model, 'date_visit1')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd','options'=>['class'=>'form-control'],'clientOptions' => ['changeMonth' => true,'changeYear' => true,'maxDate' => 'today',]]) ?>

    <span class="visit2 hide">
    <?= $form->field($model, 'res_status2')->dropDownList($list, ['prompt'=>'--Please select--', 'onChange'=>'checkAppointment($(this).val())']) ?>
    
    <?= $form->field($model, 'date_visit2')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd','options'=>['class'=>'form-control'],'clientOptions' => ['changeMonth' => true,'changeYear' => true,'maxDate' => 'today',]]) ?>
    </span>
    <span class="visit3 hide">
    <?= $form->field($model, 'res_status3')->dropDownList($list, ['prompt'=>'--Please select--', 'onChange'=>'checkAppointment($(this).val())']) ?>
    
    <?= $form->field($model, 'date_visit3')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd','options'=>['class'=>'form-control'],'clientOptions' => ['changeMonth' => true,'changeYear' => true,'maxDate' => 'today',]]) ?>
</span>
    <span class="appt hide">
        <?= $form->field($model, 'appoint_date')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd','options'=>['class'=>'form-control'],'clientOptions' => ['changeMonth' => true,'changeYear' => true,'minDate' => 'today',]]) ?>
    </span>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id'=>'updateVisit']) ?>
    </div>
    <input type="hidden" id="idvisit" value="<?= $_GET['visit'];?>"/>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>

<script>
    $(document).ready(function(){
        var res_status1 = $("#participant-res_status1").val(),
        date_visit1 = $("#participant-date_visit1").val(),
        res_status2 = $("#participant-res_status2").val(),
        date_visit2 = $("#participant-date_visit2").val(),
        res_status3 = $("#participant-res_status3").val(),
        date_visit3 = $("#participant-date_visit3").val();
        
        if(res_status1 !='' && res_status2 =='' && res_status3 ==''){
            $(".visit2").removeClass("hide");
            $("#participant-res_status1, #participant-date_visit1").attr("disabled", 'disabled');
        }else if(res_status1 !='' && res_status2 !='' && res_status3 ==''){
            $(".visit2, .visit3").removeClass("hide");
            $("#participant-res_status1, #participant-date_visit1,#participant-res_status2, #participant-date_visit2").attr("disabled", 'disabled');
        }
        
        
        $("#updateVisit").on('click', function(event){
            var res_status1 = $("#participant-res_status1").val(),
            date_visit1 = $("#participant-date_visit1").val(),
            res_status2 = $("#participant-res_status2").val(),
            date_visit2 = $("#participant-date_visit2").val(),
            res_status3 = $("#participant-res_status3").val(),
            date_visit3 = $("#participant-date_visit3").val(),
            appoint_date = $("#participant-appoint_date").val(),
            visit = $("#idvisit").val();
            if(visit==1){
                if(res_status1 == 'Present' && (appoint_date =='' || appoint_date =='1970-01-01')){
                    enableError("participant-appoint_date", "Appointment date cannot be empty or 1970-01-01");
                    event.preventDefault();
                }
            }else if(visit==2){
                if(res_status2 ==''){
                    enableError("participant-res_status2","Please check on the  resident status 2");
                    event.preventDefault();
                }else if(date_visit2 == ''){
                     enableError("participant-date_visit2","Please check on the date visit2");
                    event.preventDefault();
                }else if(res_status2 == 'Present' && (appoint_date =='' || appoint_date =='1970-01-01')){
                    enableError("participant-appoint_date","Appointment date cannot be empty or 1970-01-01");
                    event.preventDefault();
                }
            }else if(visit==3){
                if(res_status3 ==''){
                    enableError("participant-res_status3","Please check on the resident status 3");
                    event.preventDefault();
                }else if(date_visit3 == ''){
                    enableError("participant-date_visit3","Please check on the date visit3");
                    event.preventDefault();
                }else if(res_status3 == 'Present' && (appoint_date =='' || appoint_date =='1970-01-01')){
                    enableError("participant-appoint_date","Appointment date cannot be empty or 1970-01-01");
                    event.preventDefault();
                }
            }
        });
    });
    
    
    function enableError(div, msg){
        $(".field-"+div).addClass('has-error');
        $(".field-"+div+" .help-block").text(msg);
    }
    function checkAppointment(val){
        if(val == 'Present'){
            $(".appt").removeClass('hide');
        }else{
            $(".appt").addClass('hide');
            $("#participant-appoint_date").val("");
        }
    }
    
    $(function() {      
 $("#participant-appoint_date").datepicker(
        { beforeShowDay: function(day) {
            var day = day.getDay();
            if (day == 1) {
                return [false, "somecssclass"]
            } else {
                return [true, "someothercssclass"]
            }
         }
        });
    });
</script>