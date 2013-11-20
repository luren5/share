    <div class="container">
      <div class="row-fluid">
        <div class="span8">
          <div class="well block">
              <h4> <span>标签"</span><span class="count"><?php echo $tag->name?></span><span>"下有<span class="count"> <?php echo $resource_num; ?>+ </span>个资源</span></h4>
          </div>
          <div class="post-list">
              <?php foreach($resources as $resource) {?>
                <div class="post-list-item clearfix">
                    <div class="pull-left"><img src="<?php echo IMG_URL?>user.png"></div>
                    <div class="post-list-body">
                        <div class="post-list-title"><a href="<?php echo $this->createUrl('resource/single', array('rid' => $resource->id)) ?>" target="_blank"><?php echo $resource->title; ?></a></div>
                        <div class="post-list-footer">
                            <span> <?php echo $resource->contributor; ?>• </span>
                            <span class="time">发表于<?php echo $resource->create_time;?></span>
                        </div>
                    </div>
                </div>
              <?php }?> 
              
            
          </div>
          <div class="pagination-con">
            <div class="pagination">
              <ul>
                <li class="disabled"><a href="#nogo">前一页</a></li>
                <li class="active"><a href="/tag/事业/page/1">1</a></li>
                <li class="disabled"><a href="#nogo">后一页</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="span4">
          <div class="well block noreply">
            <h4>支持一起分享</h4><a target="_blank" href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&amp;email=OwkPAwkDDw0ODAx7SkoVWFRW" style="text-decoration:none;"><img src="http://rescdn.qqmail.com/zh_CN/htmledition/images/function/qm_open/ico_mailme_12.png"></a>
          </div>
        </div>
      </div>
    </div>