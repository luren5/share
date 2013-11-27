    <div class="container">
      <div class="row-fluid">
        <div class="span12">
          <div class="row span10">
            <section class="offset2 block well">
                <?php $this->beginContent('//layouts/errorBox', array('errors' =>$errors));$this->endContent();?>
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
                  <input type="submit" value="登录" class="btn btn-primary">
                  <a href="<?php echo $this->createUrl('user/register') ?>">没有帐号？点击这里注册</a>
                </div
                </form> 
            </section>
          </div>
        </div>
      </div>
    </div>