<body>
<table border="0" cellpadding="0" cellspacing="0" id="senfe">
  <tr>
    <th>编号</th>
    <th>标题</th>
    <th>内容</th>
    <th>留言人</th>
    <th>创建时间</th>
    <th>回复</th>
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
            <td class="s">
                <button><a href ="<?php echo $this->createUrl('feedback/reply', array(
                    'messageBy' => $feedback->messageBy,
                    'title' => $feedback->title,
                    'content' => $feedback->content,
                    'id' => $feedback->id,
                    ))?>">回复</a></button>
            </td>
            <td><a href="<?php echo $this->createUrl('feedback/delete', array('id' => $feedback->id))?>"><img src="<?php echo ADMIN_IMG_URL;?>delete.png"></a></td>
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
