<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ParticipantSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="participant-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_p') ?>

    <?= $form->field($model, 'pk_person') ?>

    <?= $form->field($model, 'name1') ?>

    <?= $form->field($model, 'name2') ?>

    <?= $form->field($model, 'name3') ?>

    <?php // echo $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'dob') ?>

    <?php // echo $form->field($model, 'study_no') ?>

    <?php // echo $form->field($model, 'age') ?>

    <?php // echo $form->field($model, 'agecat') ?>

    <?php // echo $form->field($model, 'pk_res') ?>

    <?php // echo $form->field($model, 'ez_hm') ?>

    <?php // echo $form->field($model, 'locn') ?>

    <?php // echo $form->field($model, 'sublocn') ?>

    <?php // echo $form->field($model, 'latt') ?>

    <?php // echo $form->field($model, 'longd') ?>

    <?php // echo $form->field($model, 'shinda2') ?>

    <?php // echo $form->field($model, 'shinda3') ?>

    <?php // echo $form->field($model, 'visited1') ?>

    <?php // echo $form->field($model, 'visited2') ?>

    <?php // echo $form->field($model, 'visited3') ?>

    <?php // echo $form->field($model, 'studyArea') ?>

    <?php // echo $form->field($model, 'visited2nd') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
