<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Valuelist */

$this->title = 'Update Valuelist: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Valuelists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="valuelist-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
