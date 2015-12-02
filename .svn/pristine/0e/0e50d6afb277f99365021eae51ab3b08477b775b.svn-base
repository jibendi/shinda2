<?php

use yii\helpers\Url;
?>
<style>
    .recordapt{
        cursor: pointer;
    }
</style>
<div class="panel panel-primary">
    <div class="panel-heading">Appointments calendar</div>
    <div class="panel-body">
        <div id="conetnt">
          <?= $model; ?>
        </div>
        <button id="prev" class="cal btn btn-primary pull-left" onClick="calendarNext('prev')"><span class="glyphicon .glyphicon-chevron-left" ></span>Prev</button> 
        <button id="nexts" class="cal btn btn-primary pull-right" onClick="calendarNext('next')"><span class="glyphicon .glyphicon-chevron-right" ></span>Next</button>
                     
</div>
    </div>

<script>
      function calendarNext(dir){
     var mon = $('.calendar caption').text(),
     months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
     visit = $(".togglevisit").val(),
    curmon = $.trim(mon.replace(/\d+/g, '')),
             
     curmon = $.inArray(curmon, months);
     if(dir=="next"){
         var nxtMon = curmon+2;
     }else{
         var nxtMon = curmon;
     }
     year = mon;
     year = parseInt($.trim(year.replace(/\D/g, '')));
     if(nxtMon==13 && dir=='next'){
         year++;
     }else if(nxtMon==0 && dir=='prev'){
         year--;
     }
     var host = "<?php echo url::base();?>/index.php/participant/calendar";
     $.post(host, {id:nxtMon, year:year, visit:visit}, function(data){
       $('#conetnt').html("").append(data);
     });
 }
 
 function getRevists(val){
        var data = val.split("/"),
        date = data[0],
        record = data[1];
        if(record ==0){
            alert("No records found on "+date);
        }else{
            var host = "<?php echo url::base();?>/index.php/participant/index?date_appoint="+date;
            window.location.href = host;
        }
        
 }
</script>

