<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Valuelist */

$this->title = 'Create Valuelist';
$this->params['breadcrumbs'][] = ['label' => 'Valuelists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="valuelist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
