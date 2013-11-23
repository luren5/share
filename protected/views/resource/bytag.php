    <div class="container">
      <div class="row-fluid">
        <div class="span8">
          <div class="well block">
              <h4> <span>标签"<?php echo $tag_name ?>"下有<span class="count"><?php echo $total_records;?></span>个资源</span></h4>
          </div>
          <div class="post-list">
              <?php foreach($resources as $resource) { ?>
                
                    <div class="post-list-item clearfix">
                    <div class="pull-left"><img src="<?php echo IMG_URL; ?>user.png">
                    </div>
                    <div class="post-list-comment-count pull-right badge badge-info"></div>
                    <div class="post-list-body">
                        <div class="post-list-title"> <a href="<?php echo $this->createUrl('resource/single', array('rid' => $resource->id)) ?>"><?php echo $resource->title; ?> </a>
                        </div>
                        <div class="post-list-footer"><span><?php echo $resource->contributor?>  • </span><span class="time">分享于<?php echo $resource->create_time; ?> • </span><span class="tags"></span>
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
           <?php $this->beginContent('//layouts/search'); ?><?php $this->endContent(); ?>
            <?php $this->beginContent('//layouts/followUs_weibo'); ?><?php $this->endContent(); ?>
          <?php $this->beginContent('//layouts/contactUs'); ?><?php $this->endContent(); ?>
          <?php $this->beginContent('//layouts/followUs_weixin'); ?><?php $this->endContent(); ?>
            
        </div>
      </div>
    </div>