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
        <legend>添加标签</legend>
        <div class="control-group">
            <label class="control-label">标签名</label>
            <div class="controls">
            <input type="text" name="tag[name]" value="" placeholder="标签名不要超过12个字" class="title">
            </div>
        </div>
        <div class="form-actions">
            <input type="submit" value="添加" class="btn btn-primary">
        </div>
    </form>
</section>