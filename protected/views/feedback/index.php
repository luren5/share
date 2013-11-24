    <div class="container">
      <div class="row-fluid">
        <div class="span8">
          <div id="feedback" class="feedback">
            <div class="well block">
                <h3>联系我们</h3>
              <p>可以通过以下方式联系我们</p>
              <p>邮箱：xhuan@hgdonline.net</p>
              <p>微博 ：<a href="http://weibo.com/u/3915153185" target="_blank">@爱分享-正能量</a></p>
              <p>微信号 ：hgdonline</p>
            </div>
            
            <div class="well block">
                <h3>留言反馈<span class="count" style="font-size: 15px">  (未登录用户也可留言！)</span></h3>
                <?php 
                    if(!empty($errors)){
                        foreach($errors as $value) {
                ?>
                            <div class="alert alert-error"><?php echo $value?></div>
                <?php } } ?>
                            
            <form action="" method="POST" class="form-horizontal">
                <div class="control-group">
                  <label class="control-label">标题</label>
                  <div class="controls">
                    <input type="text" name="feedback[title]" value="" placeholder="请不要超过20字" class="title">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">内容</label>
                  <div class="controls">
                    <textarea rows="5" name="feedback[content]" placeholder="请不要超过50字" class="span9"></textarea>
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
                      <input type="text" name="feedback[varifyCode]" placeholder="验证码" >
                  </div>
                </div>
                <div class="form-actions">
                  <input type="submit" value="提交" class="btn btn-primary">
                </div>
              </form>
           
            </div>
          </div>
        </div>
        <div class="span4">
            <h3 class="count">支持我们</h3>
            <?php $this->beginContent('//layouts/followUs_weibo'); ?><?php $this->endContent(); ?>
         <?php $this->beginContent('//layouts/followUs_weixin'); ?><?php $this->endContent(); ?>
        </div>
      </div>
    </div>