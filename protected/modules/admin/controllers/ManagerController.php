<?php
    class ManagerController extends Controller{
     
        function filters() {
            return array(
                'accessControl',
            );
        }
        
        function accessRules() {               
            return array(
                array(
                    'allow',
                    'actions'=>array('logout', 'add'),
                    'users' => array('@'),
                ),
                array(
                    'deny',
                    'actions'=>array('logout', 'add'),
                    'users' => array('*'),
                ),

            );
        }
    
        public function actionLogin() {
            $model = new LoginForm;
            if(isset($_POST['admin'])) {
                $model->attributes=$_POST['admin'];
                if($model->validate() && $model->login()) {
                    $this->redirect(array('index/main'));
                } else {
                    $this->errors = $this->assembleErrors($model ->getErrors());
                }
            }
            $this->renderPartial('login',  array('errors' => $this->errors));
        }
        
        
        public function actionAdd() {
            return;
            $model = new Administrator();
            $data = array(
                'username' => 'minishine', 
                'password'=> md5('xuhuan101'),
                'realname' => '徐欢欢',
                'email' => 'xhuan@hgdonline.net',
                'phone' => '13307139608',
                'create_time' => date('Y-m-d H:i:s'),
            );
            $model->attributes = $data;
            $model->save();
            
            
        }
        
        public function actionLogout() {
            //删除session变量
            //Yii::app()->session->clear();
            //删除服务器session变量
            //Yii::app()->session->destroy();
            Yii::app()->user->logout();
            $this->redirect(array('manager/login'));
        }
    }