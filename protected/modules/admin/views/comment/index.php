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
    <th>评论内容</th>
    <th>资源号</th>
    <th>评论者</th>
    <th>创建时间</th>
    <th>删除</th>
  </tr>
    
     <?php foreach($comments as $comment) {?>
    <form action="<?php echo $this->createUrl('user/update')?>" method="post">
        <tr>
            <td class="f">
                <?php echo $comment->id;?>
            </td>
            <td class="s">
                <?php echo $comment->content;?>
            </td> 
            <td class="t">
                <?php echo $comment->resource_id;?>
            </td>
            <td class="s">
                <?php echo $comment->author;?>
            </td>
            <td class="s">
                <?php echo $comment->create_time;?>
            </td>
            <td><a href="<?php echo $this->createUrl('comment/delete', array('id' => $comment->id))?>"><img src="<?php echo ADMIN_IMG_URL;?>delete.png"></a></td>
        </tr>
    </form>
    <?php } ?>
</table>

</body>
</html>
