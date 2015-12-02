<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchBpspot */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bpspot-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_bps') ?>

    <?= $form->field($model, 'fk_study_no') ?>

    <?= $form->field($model, 'fk_person') ?>

    <?= $form->field($model, 'date_visit') ?>

    <?= $form->field($model, 'time_visit') ?>

    <?php // echo $form->field($model, 'consent_signed') ?>

    <?php // echo $form->field($model, 'not_consented_rsn') ?>

    <?php // echo $form->field($model, 'study_info_given') ?>

    <?php // echo $form->field($model, 'height') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'muac') ?>

    <?php // echo $form->field($model, 'ssn') ?>

    <?php // echo $form->field($model, 'pulse') ?>

    <?php // echo $form->field($model, 'bp_syst_1') ?>

    <?php // echo $form->field($model, 'bp_dyst_1') ?>

    <?php // echo $form->field($model, 'bp_syst_2') ?>

    <?php // echo $form->field($model, 'bp_dyst_2') ?>

    <?php // echo $form->field($model, 'bp_syst_3') ?>

    <?php // echo $form->field($model, 'bp_dyst_3') ?>

    <?php // echo $form->field($model, 'serial_no_bpm') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
