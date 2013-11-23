<?php
    class UserController extends Controller
    {
        public function actions(){
            return array( 
                // captcha action renders the CAPTCHA image displayed on the contact page
                'captcha'=>array(
                        'class'=>'CCaptchaAction',
                        'backColor'=>0xFFFFFF, 
                        'maxLength'=>'4',       // 最多生成几个字符
                        'minLength'=>'4',       // 最少生成几个字符
                        'height'=>'40',
                        'width'=>'230',
                ), 
            ); 
        }

        public function actionLogin() {
            $model = new LoginForm;
            if(isset($_POST['user'])) {
                $model->attributes=$_POST['user'];
                if($model->validate() && $model->login()) {
                    $this->redirect(array('index/index'));
                } else {
                    $this->errors = $this->assembleErrors($model ->getErrors());
                }
            }
            $this->render('login',  array('errors' => $this->errors));
        }

        public function actionRegister() {
            if(isset($_POST['user'])) {
                $model = new User;
                $model->attributes = $_POST['user'];
                $model->create_time = date('Y-m-d H:i:s');
                $model->validate();
                if($model->save()) {
                    $this->redirect(array('index/index'));
                } else {
                    $this->errors = $this->assembleErrors($model ->getErrors());
                }
            }
            $this->render('reg', array('errors' => $this->errors));
        }

        public function actionProfile() {
            $this->render('profile');
        }
        
        public function actionLogout() {
            Yii::app()->user->logout();
            $this->redirect(array('index/index'));
            //$this->redirect(Yii::app()->homeUrl);
            //这里设置默认的siteController
        }

    }
