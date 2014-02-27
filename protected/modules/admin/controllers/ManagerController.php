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
        
        public function actionLogout() {
            Yii::app()->user->logout();
            $this->redirect(array('manager/login'));
        }
    }