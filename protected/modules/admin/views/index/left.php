<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simpla Admin by www.865171.cn</title>
<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL;?>reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL;?>style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL;?>invalid.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo ADMIN_JS_URL;?>jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_JS_URL;?>simpla.jquery.configuration.js"></script>

</head>
<body>
<div id="body-wrapper">
  <!-- Wrapper for the radial gradient background -->
  <div id="sidebar">
    <div id="sidebar-wrapper">
      <!-- Logo (221px wide) -->
      <a href=""><img id="logo" src="<?php echo ADMIN_IMG_URL;?>logo.png"/></a>
      <!-- Sidebar Profile links -->
      <div id="profile-links">
        <a>欢迎回来<?php echo Yii::app()->user->name; ?> </a> | <a href="<?php echo SITE_URL;?>" target="_blank" title="View the Site">首页</a> | <a href="<?php echo $this->createUrl('manager/logout') ?>" title="Sign Out">退出</a> 
      </div>
      
      
      
      <ul id="main-nav">
        <!-- 左边导航 -->
        <li> 
            <a href="#" class="nav-top-item">会员</a>
            <ul>
            <!-- Add class "current" to sub menu items also -->
            <li><a href="<?php echo $this->createUrl('user/index') ?>" target="right">会员管理</a></li>
            </ul>          
        </li>
        <li> 
            <a href="#" class="nav-top-item">公告</a>
            <ul>
            <!-- Add class "current" to sub menu items also -->
            <li><a href="<?php echo $this->createUrl('announcement/index') ?>" target="right">公告列表</a></li>
            <li><a href="<?php echo $this->createUrl('announcement/add') ?>" target="right">添加公告</a></li>
          </ul>
        </li>
        <li> 
            <a href="#" class="nav-top-item">标签</a>
            <ul>
            <!-- Add class "current" to sub menu items also -->
            <li><a href="<?php echo $this->createUrl('tag/index') ?>" target ="right">标签列表</a></li>
            <li><a href="<?php echo $this->createUrl('tag/add') ?>" target ="right">添加标签</a></li>
          </ul>
        </li>
        <li> 
            <a href="#" class="nav-top-item">资源</a>
            <ul>
            <li><a href="<?php echo $this->createUrl('resource/index') ?>" target ="right">资源列表</a></li>
            <li><a href="<?php echo $this->createUrl('comment/index') ?>" target ="right">资源评论管理</a></li>
            <li><a href="<?php echo $this->createUrl('resource/keyword') ?>" target ="right">搜索关键词管理</a></li>
          </ul>
        </li>
        <li> 
            <a  class="nav-top-item">管理员设置</a>
            <ul>
            <li><a href="<?php echo $this->createUrl('administrator/index')?>" target ="right">管理员信息</a></li>
            <li><a href="<?php echo $this->createUrl('administrator/add')?>" target ="right">添加管理员</a></li>
          </ul>
        </li>
        <li>
            <a href="#" class="nav-top-item">反馈</a>
            <ul>
                <li><a href="<?php echo $this->createUrl('feedback/index')?>" target="right">用户反馈</a></li>
                <li><a href="<?php echo $this->createUrl('feedback/replyList')?>" target="right">回复列表</a></li>
            </ul>
        </li>
        <li> <a href="#" class="nav-top-item">站点设置</a>
          <ul>
            <li><a href="#">邮箱</a></li>
            <li><a href="#">短信接口</a></li>
          </ul>
        </li>
        <li> <a href="#" class="nav-top-item">运行日志</a>
          <ul>
            <li><a href="#">Calendar Overview</a></li>
            <li><a href="#">Add a new Event</a></li>
            <li><a href="#">Calendar Settings</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>
</body>
</html>
