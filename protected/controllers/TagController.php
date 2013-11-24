<?php

class TagController extends Controller
{
	public function actions()
	{
		return array(
			
		);
	}
    
	public function actionResource() {
        if(!isset($_GET['tid'])) {
            $this->redirect(array('index/index'));
        }
        $tag = Tags::model()->findByPk($_GET['tid']);
        $resource_num = Resource::model()->count("tag_id=:tag_id", array(':tag_id' => $_GET['tid']));
        $resources = Resource::model()->findAllByAttributes(array('tag_id' => $_GET['tid']));
        $this->render('resource', array(
            'tag' => $tag,
            'resource_num' => $resource_num,
            'resources' => $resources,
        )); 
        
    }
    
    public function actionApply() {
        if(isset($_POST['name'])) {
            if(isset(Yii::app()->user->identity)) {
                $model = new Tags;
                $model->name = $_POST['name'];
                $model->status = 0;
                $model->create_time = date('Y-m-d H:i:s');
                $model->validate();
                if(!$model->save()) {
                    $this->errors = $this->assembleErrors($model ->getErrors());
                } else {
                    array_push($this->errors, '申请成功，等待管理员申核');
                }
            } else {
                array_push($this->errors, '请先登录');
            }
        }
        $this->render('apply', array(
            'errors' => $this->errors,
        ));
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