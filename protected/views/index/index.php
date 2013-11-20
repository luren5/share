   
    <div class="container">
      <div class="row-fluid">
        <div class="span8">
          <div class="well block">
            <h3>这是湖工大的分享网站</h3>
            <h4> <span class="count"><?php echo $user_num?>+</span>同鞋分享了<span class="count"><?php echo $resource_num;?>+</span>个资源</h4>
          </div>
          <div class="block tag-nav">
            <div class="cell">
              <div class="pull-right"><a href="write.htm" class="write btn btn-success btn-small">申请标签</a></div>
              <div class="wellcome">导航标签</div>
            </div>
            <div class="inner">
                <?php foreach($tags as $tag) { ?>
                    <a href=""  class="tag-item"><?php echo $tag->name; ?></a>
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
                    <div class="post-list-footer"><span><?php echo $resource->contributor?>•分享于</span><span class="time"><?php echo $resource->create_time?>• </span>
                    </div>
                </div>
                </div>
              <?php } ?>
          </div>
          <div class="pagination-con">
            <div class="pagination">
              <ul>
                <li class="disabled"><a href="#nogo">前一页</a></li>
                    <?php for($i = $pagination_first; $i <= $pagination_last; $i++) { ?>
                        <li <?php if($cur_page == $i) { ?> class='active' <?php }?>><a href="">
                                 <?php echo $i;?>
                            </a>
                        </li>
                    <?php } ?>
                <li><a href="page/2.htm">下一页</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="span4">
          <div class="well block noreply">
            <h4>站点公告</h4>
            <p>人生已经如此的艰难，有些事情就不必拆穿！</p>
            <p>人生已经如此的艰难，有些事情就不必拆穿！</p>
          </div>
          <div class="well block noreply">
            <h4>站内搜索</h4>
              这里加一个搜所框
          </div>
            
          <div class="well block top-user"> 
            <h4>等待分享</h4>
            <ul>
              <li><a href="post/525ac432a0401b4135000001.htm" >求一份实验报告 </a></li>
            
            </ul>
          </div>
            
          <div class="well block top-user"> 
            <h4>热门用户</h4>
            <a href="/u/50139a6dc226e39609000018/profile">守候的寂寞 </a>
            <a href="/u/5015775e3217bf571b000030/profile">yes </a>
            <a href="/u/50159c383217bf571b00003a/profile">mario </a>


          </div>
        </div>
      </div>
    </div>