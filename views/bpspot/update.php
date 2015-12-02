<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bpspot */

$this->title = 'Update Bpspot';
?>
<div class="bpspot-update">

    <?= $this->render('_form', [
        'model' => $model,
        'persondetails'=>$persondetails
    ]) ?>

</div>
