<?php
    echo "利用yii助手（小物件，创建form表单）";
?>
<html>
    <head></head>
    <body>
        <?php $form = $this->beginWidget('CActiveForm');?>
            <?php echo $form->textField($goods_model,'goods_name');?>
            //上面的$goods_form是从actio里面传递过来的
            //这样创建出来的表单域前面的名字都是英文（比如‘商品名称’会显示为‘goods_name’）
            
            
            //这个时候就需要在Goods的模型里面创建一个叫attributeLabels的方法（去那边看）
            //然后如下
            <?php echo $form->labelEx($goods_model,'goods_name');?>
            <?php echo $form->textField($goods_model,'goods_name');?>
            
        <?php $this->endwidget(); ?>
        
        
    </body>
    
    
</html>