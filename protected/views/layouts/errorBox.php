<?php 
    if(!empty($errors)){
        foreach($errors as $key => $value) {
            if($value) {   //正确的提醒  
?>
    <div class="alert alert-info"><?php echo $key?></div>
<?php } else {?>  
    <div class="alert alert-error"><?php echo $key?></div>
<?php
            } 
        }
    }
?>