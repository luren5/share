<section class="block well">
    <?php $this->beginContent('//layouts/errorBox', array('errors' =>$errors));$this->endContent();?>
    <center><a  href = "<?php  echo $this->createUrl('tag/index') ?>" class="btn btn-primary">返回标签列表</a></center>
</section>