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
            if(Yii::app()->user->name != 'minishine') {
                array_push($this->errors, '添加操作只有超级管理员可执行');
            } else {
                if(isset($_POST['admin'])) {
                    $model = new Administrator;
                    $model->attributes = $_POST['admin'];
                    $model->password = md5($_POST['admin']['password']);
                    $model->create_time = date('Y-m-d H:i:s');
                    $model->validate();
                    if($model->save()) {
                        $this->redirect(array('administrator/index'));
                    } else {
                        $this->errors = $this->assembleErrors($model ->getErrors());
                    }
                }  
            }
            $this->render('add', array('errors' => $this->errors));
        }
        
        public function actionDelete() {
            if(Yii::app()->user->name != 'minishine') {
                array_push($this->errors, '删除操作只有超级管理员可执行');
            } else {
                if(isset($_GET['id'])) {
                    Tags::model()->deleteByPk($_GET['id']);
                }  
            }
            $this->redirect(array('administrator/index'));
        }
    }