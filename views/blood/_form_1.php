<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Blood */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blood-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fk_person')->textInput() ?>

    <?= $form->field($model, 'blood_collected')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reason_blood_not_collected')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_collect_blood')->textInput() ?>

    <?= $form->field($model, 'time_blood_collected')->textInput() ?>

    <?= $form->field($model, 'sample_labelled')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'genotype_aliquots')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fbc_aliquots')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'elisa_aliquots')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shinda_labels')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'frozen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fw_visit1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_visit')->textInput() ?>

    <?= $form->field($model, 'time_visit')->textInput() ?>

    <?= $form->field($model, 'date_received_blood')->textInput() ?>

    <?= $form->field($model, 'time_received_blood')->textInput() ?>

    <?= $form->field($model, 'date_result_spot_blood')->textInput() ?>

    <?= $form->field($model, 'time_result_spot_blood')->textInput() ?>

    <?= $form->field($model, 'sickle_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alpha_thela')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'na')->textInput() ?>

    <?= $form->field($model, 'k')->textInput() ?>

    <?= $form->field($model, 'cr')->textInput() ?>

    <?= $form->field($model, 'urea')->textInput() ?>

    <?= $form->field($model, 'chloride')->textInput() ?>

    <?= $form->field($model, 'angiopoietin2')->textInput() ?>

    <?= $form->field($model, 'HbA1c')->textInput() ?>

    <?= $form->field($model, 'tech_initial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tech_date')->textInput() ?>

    <?= $form->field($model, 'tech_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
