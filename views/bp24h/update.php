<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bp24h */

$this->title = 'Update Bp24h';
?>
<div class="bp24h-update">


    <?= $this->render('_form', [
        'model' => $model,
        'upload' => $upload,
         'dataProvider' => $dataProvider,
        'persondetails' => $persondetails,
    ]) ?>

</div>
