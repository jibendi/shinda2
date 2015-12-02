<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bp24hSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bp24h-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idbp24') ?>

    <?= $form->field($model, 'fk_study_no') ?>

    <?= $form->field($model, 'fk_person') ?>

    <?= $form->field($model, 'date_abpm_started') ?>

    <?= $form->field($model, 'time_abpm_start') ?>

    <?php // echo $form->field($model, 'time_abpm_end') ?>

    <?php // echo $form->field($model, 'leaflet_given') ?>

    <?php // echo $form->field($model, 'diary_given') ?>

    <?php // echo $form->field($model, 'time_bed') ?>

    <?php // echo $form->field($model, 'time_woke') ?>

    <?php // echo $form->field($model, 'succ_readings') ?>

    <?php // echo $form->field($model, 'serial_no_abpm') ?>

    <?php // echo $form->field($model, 'diary_collected') ?>

    <?php // echo $form->field($model, 'wasuploaded') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
