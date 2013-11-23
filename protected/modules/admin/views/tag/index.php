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
    <th>名称</th>
    <th>状态</th>
    <th>创建时间</th>
    <th>编辑保存</th>
    <th>删除</th>
  </tr>
    
     <?php foreach($tags as $tag) {?>
    <form action="<?php echo $this->createUrl('tag/update')?>" method="post">
        <tr>
            <td class="f">
                <?php echo $tag->id;?>
            </td>
            <td class="s">
                <input type="text" name="tag[name]" value ="<?php echo $tag->name;?>"/>
            </td> 
            <td class="s">
                <input type="radio" name="tag[status]" value="1" <?php if($tag->status === '1') echo 'checked="checked"' ?>/>正常
                <input type="radio" name="tag[status]" value="0" <?php if($tag->status === '0') echo 'checked="checked"' ?>/>封锁
            </td>
            <td class="t">
                <?php echo $tag->create_time;?>
            </td>
            <td><button type="submit" style="background-image: url('<?php echo ADMIN_IMG_URL;?>change.png')"></button></td>
            <td><a href="<?php echo $this->createUrl('tag/delete', array('id' => $tag->id))?>"><img src="<?php echo ADMIN_IMG_URL;?>delete.png"></a></td>
        </tr>
    </form>
    <?php } ?>
</table>

</body>
</html>
