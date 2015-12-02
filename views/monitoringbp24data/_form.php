<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Monitoringbp24data */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="monitoringbp24data-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'time')->textInput() ?>

    <?= $form->field($model, 'SBPbr')->textInput() ?>

    <?= $form->field($model, 'dia')->textInput() ?>

    <?= $form->field($model, 'pulse')->textInput() ?>

    <?= $form->field($model, 'SBPao')->textInput() ?>

    <?= $form->field($model, 'AIXao')->textInput() ?>

    <?= $form->field($model, 'AIXbr')->textInput() ?>

    <?= $form->field($model, 'PWVao')->textInput() ?>

    <?= $form->field($model, 'PWVsd')->textInput() ?>

    <?= $form->field($model, 'fk_person')->textInput() ?>

    <?= $form->field($model, 'date_creation')->textInput() ?>

    <?= $form->field($model, 'fk_id24h')->textInput() ?>

    <?= $form->field($model, 'fk_study_no')->textInput() ?>

    <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
