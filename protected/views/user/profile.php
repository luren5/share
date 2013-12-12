<div class="container">
      <div class="row-fluid">
        <div class="span8">
          <div class="profile block well">
            <div class="img-con"><img src="http://s.yidianmimi.com/user-100.png" class="img-polaroid"><a href="/u/head" class="edit-head"></a>
            </div>
            <p class="name">minishine </p>
            <p>
                <span> <small>分享了</small><?php echo $resource_num; ?><small>个资源</small></span>
                <span> <small>发表了</small><?php echo $comment_num;?><small>个评论</small></span>
            </p>
          </div>
            <section class="offset block well">
            <form action="" method="POST" class="form-horizontal">
                <legend><h3>基本资料</h3></legend>
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
          </br>
        <div class="span4">
          <div class="well block noreply">
              <h3>未读提醒</h3>  
              <?php if(!$notices) { ?>
              <p>暂无未读提醒</p>
              <?php } else {
                  foreach($notices as $notice) {
              ?>
              <li>
                  <a href="<?php echo $this->createUrl('resource/single', array('rid' => $notice->resource_id)) ?>">
                      <?php echo $notice->author.' @您："'.  mb_substr($notice->content, 0, 15).'…"';?>
                  </a>
              </li>
              <?php } } ?>
          </div>

     

        </div>
      </div>
    </div>