<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户管理</title>
<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL;?>table.css" type="text/css">

<body>
<table border="0" cellpadding="0" cellspacing="0" id="senfe">
  <tr>
    <th>编号</th>
    <th>用户名</th>
    <th>邮箱</th>
    <th>状态</th>
    <th>注册时间</th>
    <th>编辑保存</th>
    <th>初始化密码</th>
    <th>删除</th>
  </tr>
    <?php foreach($users as $user) {?>
    <form action="<?php echo $this->createUrl('user/update')?>" method="post">
        <tr>
            <td class="f">
                <?php echo $user->id;?>
                <input type="hidden" name="user[id]" value=<?php echo $user->id;?> />
            </td>
            <td class="s">
                <?php echo $user->username;?>
            </td> 
            <td class="t">
                <?php echo $user->email;?>
            </td>
            <td class="s">
                <input type="radio" name="user[status]" value="1" <?php if($user->status === '1') echo 'checked="checked"' ?>/>正常
                <input type="radio" name="user[status]" value="0" <?php if($user->status === '0') echo 'checked="checked"' ?>/>封锁
            </td>
            <td class="t">
                <?php echo $user->create_time;?>
            </td>
            <td><button type="submit" ><img src="<?php echo ADMIN_IMG_URL;?>save.png" /></button></td>
            <td><a href=""><img src="<?php echo ADMIN_IMG_URL;?>change.png"></a></td>
            <td><a href="<?php echo $this->createUrl('user/delete', array('id' => $user->id))?>"><img src="<?php echo ADMIN_IMG_URL;?>delete.png"></a></td>
        </tr>
    </form>
    <?php } ?>
</table>
</body>
</html>
