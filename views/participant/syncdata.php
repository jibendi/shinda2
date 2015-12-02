<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\Url;
?>
<div class="panel panel-default">
    <div class="panel-heading"><h4>Synchronization - <small>Please select the computer and click sync</small></h4></div>
<div class="panel-body">
     <?php if(Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success" role="alert">
        <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>
    <?php if(Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger" role="alert">
        <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
        <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>
<div class="alert alert-danger alert-dismissable errorDismiss hide"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times;</button><span class="text-error"></span></div>
  
    <?php $form = ActiveForm::begin();?>
        <div class="sdd">
         <?= $form->field($model, 'name')->dropDownList(['main server'=>'Main Server'], ['disabled'=>'disabled']) ?>
        </div>

   <div class="participants-form">  
    <?php ActiveForm::end(); ?>
</div>
<button class="btn btn-primary btn-lg btn-start" onclick="sync()">Sync</button>
    <p class="connection hide text-danger">Please check and make sure the laptop is connected to the intranet and refresh the page</p>
</div>
</div>

<script>
    
    function sync(){
         var options = {
                    "backdrop" : "static"
                }
        $("#loading").modal(options);
        var host = "/shinda2/web/index.php/participant/getdata";
        window.location.href = host;
    }
   
    
  
       
</script>


<!-- Modal -->
<div class="modal fade" id="loading" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body text-center">
          <img src="<?= Yii::$app->request->baseUrl;?>/images/loading.gif" style="width: 100px;height: 100px"/>
          <p>Please wait, synchronization taking place</p>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
