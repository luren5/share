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
        <legend>添加管理员</legend>
        <div class="control-group">
            <label class="control-label">用户名</label>
            <div class="controls">
            <input type="text" name="admin[username]" value="" placeholder="" class="title">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">密码</label>
            <div class="controls">
            <input type="text" name="admin[password]" value="" placeholder="" class="title">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">真实姓名</label>
            <div class="controls">
            <input type="text" name="admin[realname]" value="" placeholder="" class="title">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">邮箱</label>
            <div class="controls">
            <input type="text" name="admin[email]" value="" placeholder="" class="title">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">电话</label>
            <div class="controls">
            <input type="text" name="admin[phone]" value="" placeholder="" class="title">
            </div>
        </div>
        <div class="form-actions">
            <input type="submit" value="添加" class="btn btn-primary">
        </div>
    </form>
</section>