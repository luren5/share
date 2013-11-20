<?php

class IndexController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			
		);
	}
    
	public function actionIndex()
	{ 
        $cur_page = isset($_GET['page']) ? $_GET['page'] :  1;
        $total_page = ceil(Resource::model()->count()/8);
        $pagination_first = floor($cur_page/6)*6 + 1;
        $pagination_last = (ceil($cur_page/6)*6 > $total_page) ? $total_page : ceil($cur_page/6)*6;
        
        $user_num = User::model()->count();
        $tags = Tags::model()->findAll();
        $resources = Resource::model()->findAll(array('order' => 'create_time desc', 'limit' => 8, 'offset' => ($cur_page - 1)*8 ));
        $resource_num = Resource::model()->count();
        
        $this->render('index', array(
            'cur_page' => $cur_page,
            'user_num' => $user_num,
            'resource_num' => $resource_num,
            'tags' => $tags,
            'resources' => $resources,
            'pagination_first' => $pagination_first,
            'pagination_last' => $pagination_last,
        ));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
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