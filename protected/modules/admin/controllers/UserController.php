<?php
    class UserController extends Controller{
        public $layout='/layouts/share_admin';
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
            if(!isset($_GET['page'])) {
                $_GET['page'] = 1;
            }
            $total_records = User::model()->count();
            $page_info = $this->paging($total_records, $_GET['page'], 0, 18);
            $total_page = $page_info['total_page'];
            $cur_page = $page_info['cur_page'];
            
            $users = User::model()->findAll(array('order' => 'create_time desc', 'limit' => 18, 'offset' => ($cur_page - 1)*18 ));
            $this->render('index', array(
                'users' => $users,
                'cur_page' => $cur_page,
                'total_page' => $total_page,
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
            $this->redirect(array('user/index'));
        }
        
        public function actionInitialize() {
            return;
            if(isset($_GET['id'])) {
                
                User::model()->updateByPk($_GET['id'], array('password' =>  md5($str)));
            }
            $this->redirect(array('user/index'));
        }
        
    }