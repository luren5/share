<section class="block well">
<?php $this->beginContent('//layouts/errorBox', array('errors' =>$errors));$this->endContent();?>
    <form action="" method="POST" class="form-horizontal">
        <legend>回复用户反馈</legend>
        <div class="control-group">
            <label class="control-label">反馈内容</label>
            <div class="controls">
                <textarea rows="5"readonly="readonly" class="span9">标题：<?php echo $title;?>******内容：<?php echo $content;?>******作者：<?php echo $messageBy; ?></textarea>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">回复<?php echo $messageBy;?></label>
            <div class="controls">
                <textarea rows="5" name="feedback_reply[reply_content]" placeholder="请不要超过100字" class="span9"></textarea>
            </div>
        </div>
        <input type ="hidden" value="<?php echo $messageBy;?>" name ="feedback_reply[reply_to]"/>
        <input type ="hidden" value="<?php echo $feedback_id;?>" name ="feedback_reply[feedback_id]"/>
        <div class="form-actions">
            <input type="submit" value="回复" class="btn btn-primary">
        </div>
    </form>
</section>