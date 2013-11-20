    <div class="container">
      <div class="row-fluid">
        <div class="span12">
          <div class="row span10">
            <section class="offset2 block well">
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
                <legend>会员登录</legend>
                <div class="control-group">
                  <label class="control-label">用户名</label>
                  <div class="controls">
                    <input type="text" name="user[username]" placeholder="用户名" >
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">密码</label>
                  <div class="controls">
                    <input type="password" name="user[password]" placeholder="密码" class="title">
                  </div>
                </div>
                <div class="form-actions">
                  <input type="submit" value="登录" class="btn btn-primary"><a href="reg.htm">没有帐号？点击这里注册</a>
                </div
                </form> 
            </section>
          </div>
        </div>
      </div>
    </div>