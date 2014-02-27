<body>
<table border="0" cellpadding="0" cellspacing="0" id="senfe">
  <tr>
    <th>编号</th>
    <th>反馈ID</th>
    <th>回复内容</th>
    <th>收件人</th>
    <th>收件人地址</th>
    <th>发件人</th>
    <th>创建时间</th>
    <th>删除</th>
  </tr>
     <?php foreach($replys as $reply) {?>
        <tr>
            <td class="f">
                <?php echo $reply->id;?>
            </td>
            <td class="s">
                <?php echo $reply->feedback_id;?>
            </td> 
            <td class="t">
                <?php echo $reply->reply_content;?>
            </td>
            <td class="s">
                <?php echo $reply->reply_to;?>
            </td>
            <td class="s">
                <?php echo $reply->reply_to_email;?>
            </td>
            <td class="s">
                <?php echo $reply->reply_from;?>
            </td>
            <td class="t">
                <?php echo $reply->create_time;?>
            </td>
            <td>
                <a href="<?php echo $this->createUrl('feedback/deleteReply', array('id' => $reply->id))?>">
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
