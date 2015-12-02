<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fragments */

$this->title = 'Update Fragments: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Fragments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fragments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
