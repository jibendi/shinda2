<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Monitoringbp24data */

$this->title = 'Update Monitoringbp24data: ' . ' ' . $model->id_monitor;
$this->params['breadcrumbs'][] = ['label' => 'Monitoringbp24datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_monitor, 'url' => ['view', 'id' => $model->id_monitor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="monitoringbp24data-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
