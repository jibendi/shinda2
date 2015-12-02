<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Monitoringbp24dataSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="monitoringbp24data-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_monitor') ?>

    <?= $form->field($model, 'time') ?>

    <?= $form->field($model, 'SBPbr') ?>

    <?= $form->field($model, 'dia') ?>

    <?= $form->field($model, 'pulse') ?>

    <?php // echo $form->field($model, 'SBPao') ?>

    <?php // echo $form->field($model, 'AIXao') ?>

    <?php // echo $form->field($model, 'AIXbr') ?>

    <?php // echo $form->field($model, 'PWVao') ?>

    <?php // echo $form->field($model, 'PWVsd') ?>

    <?php // echo $form->field($model, 'fk_person') ?>

    <?php // echo $form->field($model, 'date_creation') ?>

    <?php // echo $form->field($model, 'fk_id24h') ?>

    <?php // echo $form->field($model, 'fk_study_no') ?>

    <?php // echo $form->field($model, 'comments') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
