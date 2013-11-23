<?php
    class AdministratorController extends Controller
    {
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
                    'actions'=> array('index', 'add', 'delete', 'update'),
                    'users' => array('@'),
                ),
                array(
                    'deny',
                    'actions'=> array('index', 'add', 'delete', 'update'),
                    'users' => array('*'),
                ),

            );
        }
    
        public function actionIndex() {
            $administrators = Administrator::model()->findAll();
            $this->render('index', array(
                'administrators' => $administrators,
            ));
        }
        
        public function actionAdd() {
            
        }
        
        public function actionDelete() {
            if(Yii::app()->user->name != 'minishine') {
                array_push($this->errors, '删除操作只有超级管理员可执行');
            } else {
                if(isset($_GET['id'])) {
                    Tags::model()->deleteByPk($_GET['id']);
                }  
                $this->redirect(array('tag/index'));
            }
        }
    }