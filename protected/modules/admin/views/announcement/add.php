<section class="block well">
    <?php 
        if(!empty($errors)){
            foreach($errors as $value) {
    ?>
                <div class="alert alert-error"><?php echo $value?></div>
    <?php
            }
        }
    ?>
    <form action="" method="POST" class="form-horizontal">
        <legend>添加公告</legend>
        <div class="control-group">
                <label class="control-label">内容</label>
                <div class="controls">
                <textarea rows="5" name="content" placeholder="请不要超过100字" class="span9"></textarea>
                </div>
            </div>
        <div class="form-actions">
            <input type="submit" value="添加" class="btn btn-primary">
        </div>
    </form>
</section>