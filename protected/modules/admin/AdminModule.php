<?php

class AdminModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'admin.models.*',
			'admin.components.*',
		));
        
        Yii::app()->setComponents(array(
            'user' => array(
                'stateKeyPrefix' => 'admin',  //设置session的前缀
                'loginUrl' => './index.php?r=admin/manager/login',  //设置后台登录页面
            ) 
        ));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
