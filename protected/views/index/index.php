    <div class="container">
      <div class="row-fluid">
        <div class="span8">
          <div class="well block">
            <h3>爱湖工、爱生活、爱分享</h3>
            <h4> 这里已经有<span class="count"><?php echo $user_num?>+</span>位同鞋分享了<span class="count"><?php echo $resource_num;?>+</span>个资源</h4>
          </div>
          <div class="block tag-nav">
            <div class="cell">
              <div class="pull-right"><a href="<?php echo $this->createUrl('tag/apply') ?>" class="write btn btn-success btn-small">申请标签</a></div>
              <div class="wellcome">导航标签</div>
            </div>
            <div class="inner">
                <?php foreach($tags as $tag) { ?>
                    <a href="<?php echo $this->createUrl('resource/bytag', array('tid' => $tag->id)) ?>" target="_blank" class="tag-item"><?php echo $tag->name; ?></a>
                <?php } ?>
            </div>
          </div>
          <div class="post-list">
              
              <div class="cell">
                <div class="wellcome">最新分享</div>
              </div>
              <?php foreach($resources as $resource) {?>
                <div class="post-list-item clearfix">
                <div class="pull-left">
                    <img src="<?php echo IMG_URL?>user.png">
                </div>
                <div class="post-list-body">
                    <div class="post-list-title"> <a href="<?php echo $this->createUrl('resource/single', array('rid' => $resource->id)) ?>"  target="_blank"><?php echo $resource->title?></a>
                    </div>
                    <div class="post-list-footer"><span><?php echo $resource->contributor?>•分享于</span><span class="time"><?php echo $resource->create_time; ?></span>
                    </div>
                </div>
                </div>
              <?php } ?>
          </div>
          
        <?php $this->beginContent('//layouts/pagination',   //分页小物件
            array('cur_page' =>$cur_page,
                'total_page' => $total_page,
                'link_argument' => isset($link_argument) ? $link_argument : array()
            ));
            $this->endContent(); 
        ?>
            
        </div>
        <div class="span4">
          <div class="well block noreply">
            <h4>站点公告</h4>
            <?php foreach($announcements as $announcement) {?>
            <li><?php echo $announcement->content;?></li>
            <?php }?>
            
          </div>
            
          <?php $this->beginContent('//layouts/search'); ?><?php $this->endContent(); ?>
            <?php $this->beginContent('//layouts/contactUs'); ?><?php $this->endContent(); ?>
            
          <div class="well block top-user"> 
            <h4>最新评论</h4>
            <ul>
                <?php foreach($comments as $comment) { ?>
                    <li><a href="<?php echo $this->createUrl('resource/single', array('rid' => $comment->resource_id)) ?>" ><?php echo mb_substr($comment->content, 0, 12, 'utf-8'); ?></a></li>
                <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>