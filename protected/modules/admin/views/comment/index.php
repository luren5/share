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
<?php $this->beginContent('//layouts/pagination',   //分页小物件
        array('cur_page' =>$cur_page,
            'total_page' => $total_page,
            'link_argument' => isset($link_argument) ? $link_argument : array(),
        ));
        $this->endContent(); 
?>