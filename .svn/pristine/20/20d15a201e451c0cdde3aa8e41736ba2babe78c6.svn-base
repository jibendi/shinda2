<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use kartik\widgets\TimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Questionnaire */
/* @var $form yii\widgets\ActiveForm */
?>

<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Past Medical history</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Socio economic background</a></li>
  </ul>

          
            <?php $form = ActiveForm::begin(['enableAjaxValidation'=>true]); ?>
  <!-- Tab panes -->
  <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="home">
          <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6">
                    <?php 
                    $yesno = ['Yes' => 'Yes','No' => 'No',];
                    $schoolLevel = [
                        'Kindergarten' => 'Kindergarten',
                        'Primary' => 'Primary',
                        'Secondary' => 'Secondary',
                        'College/University' => 'College/University',
                        'Refused to answer' => 'Refused to answer',
                        'Never attended' => 'Never attended'
                    ]?>

                    <?= $form->field($model, 'date_interview')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd','options'=>['class'=>'form-control'], 'clientOptions' => ['changeMonth' => true,'changeYear' => true]])?> 

                    <?= $form->field($model, 'time_interview')->widget(TimePicker::classname(), []);?>
                    
                    <?php if($gender != 'm'){?>
                        <?= $form->field($model, 'pregnant')->dropDownList($yesno, ['prompt'=>'--Please select--', 'onChange'=>'checkpreg($(this).val())']);?>

                  <span class="checkpreg hide"><?= $form->field($model, 'menstruating')->dropDownList($yesno, ['prompt'=>'--Please select--']);?></span>

                        <?= $form->field($model, 'lmp')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd','options'=>['class'=>'form-control'], 'clientOptions' => ['changeMonth' => true,'changeYear' => true,'maxDate' => 'today',]])?>
                    <?php } ?>
                    <?= $form->field($model, 'ever_diagnosed_hbp')->dropDownList($yesno, ['prompt'=>'--Please select--']);?>

                    <?= $form->field($model, 'under_med_hbp')->dropDownList($yesno, ['prompt'=>'--Please select--', 'onChange'=>'showHide($(this).val(), "undermed")']);?>
                    
                  <span class="undermed hide">
                    <?= $form->field($model, 'hbp_med_list')->textarea(['rows' => 2]) ?>
                  </span>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
                  
                    <?= $form->field($model, 'suffered_malaria')->dropDownList($yesno, ['prompt'=>'--Please select--', 'onChange'=>'showHide($(this).val(), "sufferedmalaria")']);?>
                <span class="sufferedmalaria hide">
                    <?= $form->field($model, 'mal_episodes')->textInput() ?>

                    <?= $form->field($model, 'dates_mal_occured')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd','options'=>['class'=>'form-control'],'clientOptions' => ['changeMonth' => true,'changeYear' => true,'maxDate' => 'today',]])?> 

                    <?= $form->field($model, 'mal_hospitalised')->dropDownList($yesno, ['prompt'=>'--Please select--']);?>
                </span>

                    <?= $form->field($model, 'other_med_condition')->dropDownList($yesno, ['prompt'=>'--Please select--', 'onChange'=>'showHide($(this).val(), "othermedcondition")']);?>
                 
                  
                  <span class="othermedcondition hide">
                    <?= $form->field($model, 'other_med_condition_name')->textInput(['maxlength' => true]) ?>
                  </span>
                  
                    <?= $form->field($model, 'med_condition_list')->textarea(['rows' => 2]) ?>
              </div>
          </div> 
      </div>
      <div role="tabpanel" class="tab-pane" id="profile">
          <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6">
                    <?= $form->field($model, 'place_of_birth_current')->dropDownList($yesno,['prompt'=>'--Please select--', 'onChange'=>'showBirthPlace($(this).val())']) ?>
                    <?php
                        $places = [
                            'Viwandani' => 'Viwandani',
                            'Korogocho' => 'Korogocho',
                        ];
                        $longspecify = [
                            'Years' => 'Years',
                            'Months' => 'Months',
                            'Days' => 'Days',
                        ]
                    ?>
                  <span class="placeyes hide"><?= $form->field($model, 'place_of_birth')->dropDownList($places, ['prompt'=>'--Please select--']) ?></span>
                  
                  <span class="placeno hide"><?= $form->field($model, 'place_of_birth_specify')->dropDownList(app\models\Counties::getcounties(), ['prompt'=>'--Please select--']) ?>
                  
                    <?= $form->field($model, 'date_of_relocation')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd','options'=>['class'=>'form-control'],'clientOptions' => ['changeMonth' => true,'changeYear' => true,'maxDate' => 'today',]])?> 

                    <?= $form->field($model, 'places_before_relocation')->textarea(['rows' => 2]) ?></span>

                    <?= $form->field($model, 'Longest_time_away')->textInput(['maxlength' => true]) ?>
                  
                    <?= $form->field($model, 'longest_time_specify')->dropDownList($longspecify, ['prompt'=>'--Please specify--']) ?>

                    <?= $form->field($model, 'left_date')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd','options'=>['class'=>'form-control'],'clientOptions' => ['changeMonth' => true,'changeYear' => true,'maxDate' => 'today',]])?> 

                    <?= $form->field($model, 'return_date')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd','options'=>['class'=>'form-control'],'clientOptions' => ['changeMonth' => true,'changeYear' => true,'maxDate' => 'today',]])?> 

                    <?= $form->field($model, 'place_away')->textarea(['rows' => 2]) ?>

                    <?= $form->field($model, 'household_school_greater_5')->dropDownList($yesno, ['prompt'=>'--Please select--']);?>

                    <?= $form->field($model, 'household_not_attend_primary')->dropDownList($yesno, ['prompt'=>'--Please select--']);?>

                    <?= $form->field($model, 'mother_edu_level')->dropDownList($schoolLevel, ['prompt'=>'--Please select---']) ?>

                    <?= $form->field($model, 'child_5yrs_late')->dropDownList($yesno, ['prompt'=>'--Please select--']);?>

              </div>
              <div class="col-lg-6col-md-6 col-sm-6">
                    <?= $form->field($model, 'household_malnourished')->dropDownList($yesno, ['prompt'=>'--Please select--']);?>

                    <?= $form->field($model, 'electricity')->dropDownList($yesno, ['prompt'=>'--Please select--']);?>
                    <?php
                        $toilettype = ['pit latrine' => 'Pit latrine','VIP' => 'VIP','pour flash' => 'pour flash'];
                        $floortype = ['dirt' => 'dirt','concrete'=>'concrete', 'sand' => 'sand','dung' => 'dung','none of these' => 'none'];
                        $fuelttype = ['dung' => 'dung','wood' => 'wood','charcoal' => 'charcoal','none of these' => 'none',];
                        $householdown = ['radio' => 'radio','TV' => 'tv','bicycle' => 'bicycle','refrigerator' => 'refrigerator','car' => 'car','none' => 'none,']
                    ?>
                    <?= $form->field($model, 'toilet_type')->dropDownList($toilettype, ['prompt'=>'--Please select--']);?>

                    <?= $form->field($model, 'share_toilet')->dropDownList($yesno, ['prompt'=>'--Please select--']);?>

                    <?= $form->field($model, 'safe_drinking_water')->dropDownList($yesno, ['prompt'=>'--Please select--']);?>

                    <?= $form->field($model, 'distance_safe_water_access')->textInput(['maxlength' => true]) ?>
                  
                    <?= $form->field($model, 'distance_units')->dropDownList(['Kilo metres'=>'Kilometres', 'Metres'],['prompt' =>'--Please select']) ?>

                    <?= $form->field($model, 'floor_type')->dropDownList($floortype, ['prompt'=>'--Please select--']);?>

                    <?= $form->field($model, 'fuel_type')->dropDownList($fuelttype, ['prompt'=>'--Please select--']);?>
                  
                  
                  <label>Do you own the following?</label>
                    <div class="row">
                        <div class="col-md-3"><?= $form->field($model,'car')->checkbox(); ?> </div>
                        <div class="col-md-3"><?= $form->field($model,'refridgerator')->checkbox(); ?> </div>
                        <div class="col-md-3"><?= $form->field($model,'bicycle')->checkbox(); ?> </div>
                    
                        <div class="col-md-3"><?= $form->field($model,'radio')->checkbox(); ?> </div>
                        <div class="col-md-3"><?= $form->field($model,'television')->checkbox(); ?> </div>  
                        <div class="col-md-3"><?= $form->field($model,'own_none')->checkbox(); ?> </div>  
                   
            </div>
                   
              </div>
          </div> 
    </div>
  </div>
</div>
<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success btn-block' : 'btn btn-primary btn-block']) ?>
</div>

<?php ActiveForm::end(); ?>

<style>
    .hasDatepicker{
        position: relative;
        z-index: 999999;
    }
</style>
<script>
    function showHide(val, divClass){
        if(divClass == 'undermed' && val == 'Yes'){
            $('.undermed').removeClass('hide');
        }else if(divClass == 'undermed' && val != 'Yes'){
            $('.undermed').addClass('hide');
            $("#questionnaire-hbp_med_list").val("");
        }else if(divClass == 'sufferedmalaria' && val == 'Yes'){
             $('.sufferedmalaria').removeClass('hide');
        }else if(divClass == 'sufferedmalaria' && val != 'Yes'){
            $('.sufferedmalaria').addClass('hide');
            $("#questionnaire-mal_episodes, #questionnaire-dates_mal_occured, #questionnaire-mal_hospitalised").val("");
        }else if(divClass == 'othermedcondition' && val =='Yes'){
            $(".othermedcondition").removeClass('hide');
        }else if(divClass == 'othermedcondition' && val !='Yes'){
            $(".othermedcondition").addClass('hide');
            $("#questionnaire-other_med_condition_name").val("");
        }
    }
    
    function checkpreg(val){
        if(val =="No"){
            $(".checkpreg").removeClass('hide');
            $("#questionnaire-menstruating").val("");
        }else{
            $(".checkpreg").addClass('hide');
        }
    }
    
    function showBirthPlace(val){
        if(val == 'Yes'){
            $(".placeyes").removeClass('hide');
            $(".placeno").addClass('hide');
            $("#questionnaire-place_of_birth_specify, #questionnaire-date_of_relocation, #questionnaire-places_before_relocation").val("");
        }else if(val == 'No'){
            $(".placeyes").addClass('hide');
            $(".placeno").removeClass('hide');
            $("#questionnaire-place_of_birth").val("");
        }
    }
</script>

