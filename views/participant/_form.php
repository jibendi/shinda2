<?php

//TTT
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Participant */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="participant-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pk_person')->textInput() ?>

    <?= $form->field($model, 'name1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sex')->textInput() ?>

    <?= $form->field($model, 'dob')->textInput() ?>

    <?= $form->field($model, 'study_no')->textInput() ?>

    <?= $form->field($model, 'age')->textInput() ?>

    <?= $form->field($model, 'agecat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pk_res')->textInput() ?>

    <?= $form->field($model, 'ez_hm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'locn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sublocn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latt')->textInput() ?>

    <?= $form->field($model, 'longd')->textInput() ?>

    <?= $form->field($model, 'shinda2')->textInput() ?>

    <?= $form->field($model, 'shinda3')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
