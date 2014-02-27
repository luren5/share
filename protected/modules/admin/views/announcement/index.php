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
<?php $this->beginContent('//layouts/pagination',   //分页小物件
        array('cur_page' =>$cur_page,
            'total_page' => $total_page,
            'link_argument' => isset($link_argument) ? $link_argument : array(),
        ));
        $this->endContent(); 
?>