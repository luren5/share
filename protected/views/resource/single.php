<div class="container">
      <div class="row-fluid">
        <div class="span8">
          <div class="post-item">
            <div class="post-info clearfix">
              <div class="post-title"> 
                <h2><?php echo $resource->title;?></h2>
              </div>
              <div class="post-footer">
                  <span> <?php echo $resource->contributor;?> • </span>
                  <span class="time">分享于<?php echo $resource->create_time;?> • </span>
                  <span class="comment">1评论 •</span>
              </div>
            </div>
            <div class="post-body">
              <div class="post-content">  
                <p> <?php echo $resource->description?></p>
                <?php 
                    if($resource->attachment) {
                        if(isset(Yii::app()->user->identity)) {
                            echo "<span><a href = ".ATT_DOWN_URL.$resource->attachment." title='附件'><img src = ".IMG_URL."download.png></a></span>";
                        } else {
                            echo "<span><a href='#' title='附件登录后可见'><img src = ".IMG_URL."fujian.png></a></span>";
                        }
                        echo '&nbsp;&nbsp;&nbsp;&nbsp;';
                    }
                    if($resource->remote_resource) {
                        if(isset(Yii::app()->user->identity)) {
                            echo "<span><a href = ".$resource->remote_resource."  target='_blank' title='下载链接'><img src = ".IMG_URL."link.png></a></a></span>";
                        } else {
                            echo "<span><a href='#' title='下载链接登录后可见'><img src = ".IMG_URL."lianjie.png></a></span>";
                        }
                    }
                ?>
                
              </div>
            </div>
            <div class="post-item-footer"><span class="tags pull-right">所属分类 • <a href=""><?php echo $tag_name;?></a></span>
              <div class="share_buttons">
                <div id="bdshare" class="bdshare_yidian bdshare_t bds_tools get-codes-bdshare"><a class="bds_qzone"></a><a class="bds_tsina"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
              </div>
            </div>
          </div>
          <section id="content-like" class="content-like"><a title="喜欢就点评一下" class="like "></a><a title="不喜欢就给点意见" class="dislike "></a></section>
          <div class="alert alert-info">
            <h4>对这个资源进行一下点评吧，会对后面的童鞋有帮助哦！</h4>
          </div>
          <?php 
                    if(!empty($errors)){
                        foreach($errors as $value) {
                ?>
                            <div class="alert alert-error"><?php echo $value?></div>
                <?php
                        }
                    }
                ?>
          <section id="reply-list" class="reply-list">
              <?php  foreach($comments as $comment) {?>
                <div class="reply-item clearfix">
                    <div class="pull-left"><img src="<?php echo IMG_URL?>user.png">
                        </div><span class="comment pull-right"></span>
                    <div class="reply-body">
                        <div class="reply-footer"><span><?php echo $comment->author;?> • </span><span class="time"><?php echo $comment->create_time?> </span>
                        </div>
                        <div class="reply-content">  
                        <p><?php echo $comment->content;?></p>
                        </div>
                    </div>
                </div>
              <?php } ?>
          </section>
        <?php $this->beginContent('//layouts/pagination',   //分页小物件
            array('cur_page' =>$cur_page,
                'total_page' => $total_page,
                'link_argument' => isset($link_argument) ? $link_argument : array()
            ));
            $this->endContent(); 
        ?>
          <section class="content-reply">
            <form action="" method="post">
              <textarea name="content" placeholder="登录后可评论，请不要超过50字"></textarea>
              <input type="submit" value="回复" class="btn btn-primary pull-right">
            </form>
          </section>
        </div>
        <div class="span4">
          <?php $this->beginContent('//layouts/contactUs'); ?><?php $this->endContent(); ?>
            <?php $this->beginContent('//layouts/followUs_weibo'); ?><?php $this->endContent(); ?>
          <?php $this->beginContent('//layouts/followUs_weixin'); ?><?php $this->endContent(); ?>
        </div>
      </div>
    </div>