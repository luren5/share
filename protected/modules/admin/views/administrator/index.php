<table border="0" cellpadding="0" cellspacing="0" id="senfe">
  <tr>
    <th>编号</th>
    <th>用户名</th>
    <th>真实姓名</th>
    <th>邮箱</th>
    <th>电话</th>
    <th>创建时间</th>
    <th>删除</th>
  </tr>
    
     <?php foreach($administrators as $administrator) {?>
        <tr>
            <td class="f">
                <?php echo $administrator->id;?>
            </td>
            <td class="s">
                <?php echo $administrator->username;?>
            </td> 
            <td class="t">
                <?php echo $administrator->realname;?>
            </td>
            <td class="s">
                <?php echo $administrator->email;?>
            </td>
            <td class="s">
                <?php echo $administrator->phone;?>
            </td>
            <td class="s">
                <?php echo $administrator->create_time;?>
            </td>
            <td>
                <a title="删除操作仅超级管理员可执行" href="<?php echo $this->createUrl('administrator/delete', array('id' => $administrator->id))?>">
                    <img src="<?php echo ADMIN_IMG_URL;?>delete.png">
                </a>
            </td>
        </tr>
    <?php } ?>
</table>