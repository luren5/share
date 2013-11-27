    <div class="container">
      <div class="row-fluid">
        <div class="span12">
          <div class="row span10">
            <section id="j-write" class="offset2 block well">
                <?php $this->beginContent('//layouts/errorBox', array('errors' =>$errors));$this->endContent();?>
              <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <legend>
                    <h3>分享我的资源 
                    <?php if(!isset(Yii::app()->user->identity)) { ?>
                        <span class="count" style="font-size: 16px;">(请在登录状态下分享)</span>
                    <?php } ?>
                    </h3>
                    </legend>
                <div class="control-group">
                  <label class="control-label"><span style="color:red">*</span>标题</label>
                  <div class="controls">
                    <input type="text" value="" name="Resource[title]" placeholder="请不要超过20个字" class="title">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><span style="color:red">*</span>资源描述</label>
                  <div class="controls">
                    <textarea rows="5" name="Resource[description]" placeholder="请不要超过100字" class="span9"></textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">附件</label>
                  <div class="controls">
                    <?php echo CHtml::activeFileField($model, 'attachment'); ?>
                      <p class="help-block muted">附件和外部链接至少选其一，文件大小不能超过<span class="count">5M</span>，格式只能是<span class="count">jpg、gif、jepg、bmp、doc、xls、wps、zip、txt、et、png、pdf</span>之一,多个文件请先打包压缩后再上传！</p>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">外部链接</label>
                  <div class="controls">
                    <input type="text" name="Resource[remote_resource]" placeholder="外部链接和附件必须选其一" />
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><span style="color:red">*</span>分类标签</label>
                  <div class="controls">
                      <select name ="Resource[tag_id]">
                          <option value="">-请选择标签分类-</option>
                          <?php foreach($tags as $tag) { ?>
                            <option value =<?php echo $tag->id ?>><?php echo $tag->name ?></option>
                          <?php } ?>
                    </select>
                      </br>
                      <span>
                          如果没有找到您想要的分类，
                          <a href="<?php echo $this->createUrl('tag/apply') ?>" target="_blank">点击这里</a>
                          申请新标签,我们会尽快处理！
                      </span>
                  </div>
                </div>
                <div class="form-actions">
                  <input type="submit" name ="submit" value="提交" class="btn btn-primary">
                </div>
              </form>
            </section>
          </div>
        </div>
      </div>
    </div>