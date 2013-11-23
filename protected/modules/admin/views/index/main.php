<html>

<frameset cols="18%,*" border="none">
    <frame src="<?php echo $this->createUrl('index/left') ?>" name="left"/>
    <frameset rows="20%,*" border="none">
        <frame src="<?php echo $this->createUrl('index/header') ?>" name="header"/>
        <frame src="<?php echo $this->createUrl('index/right') ?>" name="right" />
    </frameset>
</frameset>
</html>