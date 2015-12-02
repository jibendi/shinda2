<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Urine */

$this->title = 'Update Urine sample details';
?>
<div class="urine-update">
    <?= $this->render('_form', [
        'model' => $model,
        'persondetails'=>$persondetails,
    ]) ?>

</div>
