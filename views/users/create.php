<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = 'Create Users';
?>
<div class="users-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
