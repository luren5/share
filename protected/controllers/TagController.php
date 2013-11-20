<?php

class TagController extends Controller
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

    /**
	 * This is the action to handle external exceptions.
	 */
    public function actionSingle() {
        if(!isset($_GET['rid'])) {
            $this->redirect(array('index/index'));
        }
        $resource = Resource::model()->findByPk($_GET['rid']);
        $tag_name = Tags::model()->findByPk($resource->tag_id)->name;
        
        $this->render('single', array(
                'resource'=> $resource,
                'tag_name' => $tag_name,
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