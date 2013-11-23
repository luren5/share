<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>table2</title>
  <link rel="stylesheet" href="<?php echo ADMIN_CSS_URL ?>table.css" type="text/css">
</head>

<body>
<table border="0" cellpadding="0" cellspacing="0" id="senfe">
  <tr>
    <th>编号</th>
    <th>标题</th>
    <th>内容</th>
    <th>留言人</th>
    <th>创建时间</th>
    <th>删除</th>
  </tr>
    
     <?php foreach($feedbacks as $feedback) {?>
        <tr>
            <td class="f">
                <?php echo $feedback->id;?>
            </td>
            <td class="s">
                <?php echo $feedback->title;?>
            </td> 
            <td class="t">
                <?php echo $feedback->content;?>
            </td>
            <td class="s">
                <?php echo $feedback->messageBy;?>
            </td>
            <td class="s">
                <?php echo $feedback->create_time;?>
            </td>
            <td><a href="<?php echo $this->createUrl('feedback/delete', array('id' => $feedback->id))?>"><img src="<?php echo ADMIN_IMG_URL;?>delete.png"></a></td>
        </tr>
    <?php } ?>
</table>
</body>
</html>
