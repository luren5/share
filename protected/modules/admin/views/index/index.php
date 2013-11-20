<?php
/*
 * 通过frameset将上、左、右三部分进行组合
 */
?>
<html>
    <head></head>
    <frameset framespacing =0 rows =" 60, *"frameborder="0">
        <frame name ="head" src ="./index.php?r=admin/index/head" frameborder="0" noresize
                  scrolling="no"/>
            <frameset cols ="170,*">
                <frame name ="left" src ="./index.php?r=admin/index/left" frameborder="0"
                          noresize />
                
                <frame name ="left" src ="./index.php?r=admin/index/right" frameborder="0" 
                          noresize />
            
        </frameset>
        
    </frameset>
</html>