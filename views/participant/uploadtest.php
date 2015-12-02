<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\jui\DatePicker;
use kartik\widgets\TimePicker;



/* @var $this yii\web\View */
/* @var $model app\models\Bp24h */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    #kbdm{
        margin-left:0px;
    }
</style>
    
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    
       <?= $form->field($model, 'file')->fileInput() ?>

<div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


<div class="bp24h-form">


    <?php ActiveForm::end(); ?>

</div>
<script>
       $(".navbar").addClass("hide");
</script>
