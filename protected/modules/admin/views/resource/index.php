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
    <th>描述</th>
    <th>附件地址</th>
    <th>远程地址</th>
    <th>标签号</th>
    <th>上传者</th>
    <th>创建时间</th>
    <th>编辑保存</th>
    <th>删除</th>
  </tr>
    
     <?php foreach($resources as $resource) {?>
    <form action="<?php echo $this->createUrl('user/update')?>" method="post">
        <tr>
            <td class="f">
                <?php echo $resource->id;?>
            </td>
            <td class="s">
                <input type="text" name="resouce[title]" value ="<?php echo $resource->title;?>"/>
            </td> 
            <td class="t">
                <input type="text" name="resouce[description]" value ="<?php echo $resource->description;?>"/>
            </td>
            <td class="s">
                <?php echo $resource->attachment;?>
            </td>
            <td class="s">
                <input type="text" name="resouce[remote_resource]" value ="<?php echo $resource->remote_resource;?>"/>
            </td>
            <td class="s">
                <input type="text" name="resouce[tag_id]" value ="<?php echo $resource->tag_id;?>"/>
            </td>
            <td class="s">
                <?php echo $resource->contributor;?>
            </td>
            <td class="t">
                <?php echo $resource->create_time;?>
            </td>
            <td><button type="submit" style="background-image: url('<?php echo ADMIN_IMG_URL;?>change.png')"></button></td>
            <td><a href="<?php echo $this->createUrl('user/delete', array('id' => $resource->id))?>"><img src="<?php echo ADMIN_IMG_URL;?>delete.png"></a></td>
        </tr>
    </form>
    <?php } ?>
</table>

</body>
</html>
