<?php

class ResourceController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
    public $errors = array();
    
	public function actions()
	{
		return array(
			
		);
	}
    
	public function actionIndex()
	{
        $model = new Resource;
        $tags = Tags::model()->findAll();
        
        if(isset($_POST['Resource'])) {
            if($_FILES['Resource']['error']['attachment'] === 4 && empty($_POST['Resource']['remote_resource'])) {
                array_push($this->errors, '附件和外部链接必须至少要填一项');
            } 
            if($_FILES['Resource']['error']['attachment'] != 4) {
                $attachment = CUploadedFile::getInstance($model, 'attachment');
                if($attachment->getError() != 0) {
                    array_push($this->errors, '上传文件错误');
                }
                if($attachment->getSize() > 1024*1024*2) {
                    array_push($this->errors, '文件大小不能超过2M');
                }
                $allow_type = array('image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/bmp');
                if(!in_array($attachment->getType(), $allow_type)) {
                    array_push($this->errors, '文件类型不允许');
                }
                
                if (is_object($attachment) && get_class($attachment)==='CUploadedFile') {
                    if(!file_exists(ATT_URL.date('Ym'))) {
                        mkdir(ATT_URL.date('Ym'), true);
                    }
                    $_POST['Resource']['attachment'] = date('Ym').'/'.time().'.'.$attachment->getExtensionName();
                } 
            }
                              
            $model->attributes=$_POST['Resource'];
            $model->contributor = '徐欢欢';   //这里为什么不能放到beforeSave里面去
            $model->create_time = date('Y-m-d H:i:s');
            
            $model->validate();
            if(empty($this->errors) && $model->save() && !empty($_POST['Resource']['attachment'])) {
                $attachment->saveAs(ATT_URL.$_POST['Resource']['attachment'], true);//附件存储成功
            } else {
                $this->errors += $this->assembleErrors($model->getErrors());
            }
        }
        $this->render('index', array('tags' => $tags, 'model'=>$model, 'errors' => $this->errors));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
    public function actionSingle() {
        if(!isset($_GET['rid'])) {
            $this->redirect(array('index/index'));
        }
        if(isset($_POST['content'])) {
            $comment = new Comment();
            $comment->content = $_POST['content'];
            $comment->author = '这里要加session';
            $comment->resource_id = $_GET['rid'];
            $comment->create_time = date('Y-m-d H:i:s');
            $comment->validate();
            if(!$comment->save()) {
                $this->errors = $this->assembleErrors($comment ->getErrors());
            }
        }
        
        $resource = Resource::model()->findByPk($_GET['rid']);
        $tag_name = Tags::model()->findByPk($resource->tag_id)->name;
        $comments = Comment::model()->findAllByAttributes(array('resource_id' => $_GET['rid']));
        $this->render('single', array(
                'resource'=> $resource,
                'tag_name' => $tag_name,
                'errors' => $this->errors,
                'comments' => $comments,
            )
        );
    }
   
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	
	
}