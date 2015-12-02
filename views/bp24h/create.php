<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bp24h */

$this->title = 'Create Bp24h';
$this->params['breadcrumbs'][] = ['label' => 'Bp24hs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bp24h-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
