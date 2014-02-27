<table border="0" cellpadding="0" cellspacing="0" id="senfe">
  <tr>
    <th>编号</th>
    <th>关键词</th>
    <th>资源id</th>
    <th>删除</th>
  </tr>
     <?php $i = 1; foreach($result as $keyword => $rid_set) {?>
    <form >
        <tr>
            <td class="f">
                <?php echo $i;?>
            </td>
            <td class="s">
                <?php echo $keyword;?>
            </td> 
            <td class="s">
                <?php echo implode(', ', $rid_set);?>
            </td>
            <td><a href="<?php echo $this->createUrl('resource/keyword', array('keyword' => $keyword))?>"><img src="<?php echo ADMIN_IMG_URL;?>delete.png"></a></td>
        </tr>
    </form>
    <?php $i++;} ?>
</table>
