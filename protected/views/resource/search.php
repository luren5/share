    <div class="container">
      <div class="row-fluid">
        <div class="span8">
          <div class="well block">
             <?php if(empty($resources)) {?>
                <h4> <span>很抱歉，未能找到包含关键词"</span><span class="count"><?php echo $key;?></span><span>"的资源，如果您通过其它的方式找到了，别忘记分享哦！</span></h4>
              <?php } else { ?>
                <h4> <span>以下是包含关键词"</span><span class="count"><?php echo $key;?></span><span>"的资源，如果对您有帮助别忘记给个好评哦！</span></h4>
                <?php } ?>
          </div>
          <div class="post-list">
              <?php foreach($resources as $resource) { ?>
                    <div class="post-list-item clearfix">
                    <div class="pull-left"><img src="http://s.yidianmimi.com/user.png">
                    </div>
                    <div class="post-list-body">
                        <div class="post-list-title"> <a href="<?php echo $this->createUrl('resource/single', array('rid' => $resource->id)) ?>"  target="_blank"><?php echo $resource->title?></a>
                        </div>
                        <div class="post-list-footer"><span> <?php echo $resource->contributor?>•分享于</span><span class="time"><?php echo $resource->create_time?>• </span>
                        </div>
                    </div>
                    </div>
              <?php } ?>
          </div>
    <div class="pagination">
        <ul>
        <li class="disabled"><a href="<?php echo $this->createUrl('', array('page' => $cur_page - 1, 'key' => $key)) ?>">前一页</a></li>
            <?php for($i = 1; $i <= $total_page; $i++) {?>
                <li <?php if($cur_page == $i) { ?> class='active' <?php }?>>
                    <a href="<?php echo $this->createUrl('', array('page' => $i, 'key' => $key)) ?>"><?php echo $i;?></a>
                </li>
            <?php } ?>
        <li><a href="<?php echo $this->createUrl('', array('page' => $cur_page + 1, 'key' => $key)) ?>">下一页</a></li>
        </ul>
    </div>
</div>
        </div>
          
          
        <div class="span4">


        </div>
      </div>
    </div>