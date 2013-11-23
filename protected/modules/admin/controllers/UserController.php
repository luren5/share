<?php
    class UserController extends Controller{
        
        function filters() {
            return array(
                'accessControl',
            );
        }
        
        function accessRules() {               
            return array(
                array(
                    'allow',
                    'actions'=> array('index', 'update', 'delete', 'initialize'),
                    'users' => array('@'),
                ),
                array(
                    'deny',
                    'actions'=> array('index', 'update', 'delete', 'initialize'),
                    'users' => array('*'),
                ),

            );
        }
    
        public function actionIndex() {
            $users = User::model()->findAll();
            $this->renderPartial('index', array(
                'users' => $users,
            ));
        }
        
        public function actionUpdate() {
            if(isset($_POST['user'])) {
                User::model()->updateByPk($_POST['user']['id'], array('status' => $_POST['user']['status']));
            } 
            $this->redirect(array('user/index'));
        }
        
        public function actionDelete() {
            if(isset($_GET['id'])) {
                User::model()->deleteByPk($_GET['id']);
            }  
            $this->redirect(array('announcement/index'));
        }
        
        public function actionInitialize() {
            return;
            if(isset($_GET['id'])) {
                
                User::model()->updateByPk($_GET['id'], array('password' =>  md5($str)));
            }
            $this->redirect(array('user/index'));
        }
        
    }