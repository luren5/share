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
    <th>公告内容</th>
    <th>发布者</th>
    <th>创建时间</th>
    <th>删除</th>
  </tr>
  <?php foreach($announcements as $announcement) {?>
        <tr>
            <td class="f">
                <?php echo $announcement->id;?>
               
            </td>
            <td class="t">
                <?php echo $announcement->content;?>
            </td>
            <td class="t">
                <?php echo $announcement->publisher;?>
            </td>
            <td class="t">
                <?php echo $announcement->create_time;?>
            </td>
            <td>
                <a href="<?php echo $this->createUrl('announcement/delete', array('id' => $announcement->id))?>">
                    <img src="<?php echo ADMIN_IMG_URL;?>delete.png">
                </a>
            </td>
        </tr>
    <?php } ?>
</table>
</body>
</html>
