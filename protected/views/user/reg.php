    <div class="container">
      <div class="row-fluid">
        <div class="span12">
          <div class="row span10">
            <section class="offset2 block well">
               <?php $this->beginContent('//layouts/errorBox', array('errors' =>$errors));$this->endContent();?>
              <form action="" method="POST" class="form-horizontal">
                <legend><h3>会员注册</h3></legend>
                <div class="control-group">
                  <label class="control-label">用户名</label>
                  <div class="controls">
                    <input type="text" name="user[username]" value="" placeholder="长度请不要超过10位" class="title">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">邮箱</label>
                  <div class="controls">
                    <input type="text" name="user[email]" placeholder="请确保邮箱地址正确" value="" class="email">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">密码</label>
                  <div class="controls">
                    <input type="password" name="user[password]" placeholder="长度在6-15位之间" class="title">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">重复密码</label>
                  <div class="controls">
                    <input type="password" name="user[repassword]" placeholder="重复密码" class="title">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">验证码</label>
                  <div class="controls">    
                      <?php $this->widget('CCaptcha',array(
                        'showRefreshButton'=>true,
                        'clickableImage'=>true,
                        'buttonLabel'=>'刷新验证码',
                        'imageOptions'=>array(
                            'alt'=>'点击换图',
                            'title'=>'点击换图',
                            'style'=>'cursor:pointer',
                            'padding'=>'10')
                        )); ?>
                      <input type="text" name="user[varifyCode]" placeholder="验证码" >
                  </div>
                </div>
                <div class="form-actions">
                  <input type="submit" value="注册" class="btn btn-primary"><a href="<?php echo $this->createUrl('user/register') ?>" > 已经有账号?点击这里登录</a>
                </div>
              </form>
            </section>
          </div>
        </div>
      </div>
    </div>