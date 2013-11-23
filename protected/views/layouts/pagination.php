<div class="pagination-con">
    <div class="pagination">
        <ul>
        <li <?php if($cur_page == 1) echo 'class = "disabled"' ?>>
            <a href="<?php echo $this->createUrl('', array('page' => $cur_page - 1) + $link_argument) ?>">前一页</a>
        </li>
            <?php for($i = 1; $i <= $total_page; $i++) {?>
                <li <?php if($cur_page == $i) { ?> class='active' <?php }?>>
                    <a href="<?php echo $this->createUrl('', array('page' => $i) + $link_argument) ?>"><?php echo $i;?></a>
                </li>
            <?php } ?>
        <li <?php if($cur_page == $total_page) echo 'class = "disabled"' ?>>
            <a href="<?php echo $this->createUrl('', array('page' => $cur_page + 1) + $link_argument) ?>">下一页</a>
        </li>
        </ul>
    </div>
</div>

