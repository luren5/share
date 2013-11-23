<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>一起分享——后台管理</title>
<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL;?>reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL;?>style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL;?>invalid.css" type="text/css" media="screen" />


</head>
<body id="login">
<div id="login-wrapper" class="png_bg">
  <div id="login-top">
    <h1>管理员登录</h1>
    <!-- Logo (221px width) -->
    <a href=""><img id="logo" src="<?php echo ADMIN_IMG_URL;?>logo.png" alt="Simpla Admin logo" /></a> </div>
  <!-- End #logn-top -->
  <div id="login-content">
    <form action="" method="post">
       <?php foreach($errors as $error) {?>
      <div class="notification information png_bg">
        <div><?php echo $error; ?></div>
      </div>
        <?php }?>
      <p>
        <label>用户名</label>
        <input class="text-input" type="text" name="admin[username]"/>
      </p>
      <div class="clear"></div>
      <p>
        <label>密   码</label>
        <input class="text-input" type="password" name="admin[password]"/>
      </p>
      <div class="clear"></div>
      <p>
        <input class="button" type="submit" value="登录" name="submit"/>
      </p>
    </form>
  </div>
  <!-- End #login-content -->
</div>
<!-- End #login-wrapper -->
</body>
</html>
