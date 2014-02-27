     <div class="container">
      <div class="row-fluid">
        <div class="span12">
          <div class="row span10">
            <section class="offset2 block well">
                <?php 
                    if(!empty($errors)){
                        foreach($errors as $error) {
                ?>
                            <div class="alert alert-error"><?php echo $error?></div>
                <?php
                        }
                    }
                ?>
                <form action="" method="POST" class="form-horizontal">
                    <legend><h3>申请新标签<span class="count" style="font-size: 16px;">(请在登录状态下申请)</span></h3></legend>
                <div class="control-group">
                  <label class="control-label">标签名</label>
                  <div class="controls">
                    <input type="text" name="name" placeholder="请不要超过10个字" >
                  </div>
                </div>
                <div class="form-actions">
                  <input type="submit" value="申请" class="btn btn-primary">
                </div
                </form> 
            </section>
          </div>
        </div>
      </div>
    </div>