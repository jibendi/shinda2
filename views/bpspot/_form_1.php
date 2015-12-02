<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bpspot */
/* @var $form yii\widgets\ActiveForm */
?>
<div>
    <kbd>
        Study No : 10 PID : 458756  DOB : 14/08/2001 Gender : Male  From : Kilifi Sub loc: Maweni 
    </kbd>
    
</div>
<div class="row">
<?php $form = ActiveForm::begin([
    'id' => 'bpspot-form',
    'options' => ['class' => 'form-horizontal'],
    'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-6\">{input}</div>\n<div class=\"col-lg-2\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-5 control-label'],
        ],
        ]); ?>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <table>
            <tr>
                <td>
                  Date Visit:  
                </td>
                <td>
                    <?= $form->field($model, 'fk_study_no')->textInput()->label(false) ?> 
                </td>
                  
            </tr>
        </table>
      <?= $form->field($model, 'fk_study_no')->textInput()->label(false) ?>

    <?= $form->field($model, 'fk_person')->textInput() ?>

    <?= $form->field($model, 'date_visit')->textInput() ?>

    <?= $form->field($model, 'time_visit')->textInput() ?>

    <?= $form->field($model, 'consent_signed')->textInput() ?>

    <?= $form->field($model, 'not_consented_rsn')->textInput() ?>

    <?= $form->field($model, 'study_info_given')->textInput() ?>

    <?= $form->field($model, 'height')->textInput() ?>

    <?= $form->field($model, 'weight')->textInput() ?>

    <?= $form->field($model, 'muac')->textInput() ?>

    <?= $form->field($model, 'ssn')->textInput() ?>

    <?= $form->field($model, 'pulse')->textInput() ?>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        
    <?= $form->field($model, 'bp_syst_1')->textInput() ?>

    <?= $form->field($model, 'bp_dyst_1')->textInput() ?>

    <?= $form->field($model, 'bp_syst_2')->textInput() ?>

    <?= $form->field($model, 'bp_dyst_2')->textInput() ?>

    <?= $form->field($model, 'bp_syst_3')->textInput() ?>

    <?= $form->field($model, 'bp_dyst_3')->textInput() ?>

    <?= $form->field($model, 'serial_no_bpm')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>
