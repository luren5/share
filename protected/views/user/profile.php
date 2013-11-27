<div class="container">
      <div class="row-fluid">
        <div class="span12">
          <div class="row span10">
            <section class="offset2 block well">
                              <form action="" method="POST" class="form-horizontal">
                <legend><h3>用户中心</h3></legend>
                <div class="control-group">
                  <label class="control-label">用户名</label>
                  <div class="controls">
                    <p><input type="text"  readonly value="<?php echo $user->username;?>" class="title"></p>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">邮箱</label>
                  <div class="controls">
                    <input type="text" name="user[email]" placeholder="邮箱" value="<?php echo $user->email;?>" class="email">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">修改密码</label>
                  <div class="controls">
                    <input type="password" name="user[password]"  placeholder="如不修改密码，可不填写" class="title">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">确认密码</label>
                  <div class="controls">
                    <input type="password" name="user[repassword]" placeholder="密码不能少于6位" class="title">
                  </div>
                </div>
                <div class="form-actions">
                  <input type="submit" value="修改" class="btn btn-primary">
                </div>
              </form>
            </section>
          </div>
        </div>
      </div>
    </div>