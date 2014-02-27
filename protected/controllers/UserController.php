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
                        'width'=>'150',
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
            if(!isset(Yii::app()->user->identity)) {
                $this->redirect(array('index/index'));
            }
            if(isset($_POST['user'])) {   //更改用户资料
                $count=User::model()->updateCounters(
                        array('username' => Yii::app()->user->name),
                        array('email=:email'),
                        array(':username'=>$_POST['user']['email'])
                    ); 
            }
            
            $resource = new Resource;
            $resource_num = $resource->countByAttributes(array('contributor' => Yii::app()->user->name));
           
            $comment = new Comment;
            $comment_num = $comment->countByAttributes(array('author' => Yii::app()->user->name));
            $notices =  $comment->findAllByAttributes(array('comment_to' => Yii::app()->user->name, 'status' => 0));
            
            $user = User::model()->findByAttributes(array('username' => Yii::app()->user->name));
            $this->render('profile', array(
                'user' => $user,
                'resource_num' => $resource_num,
                'comment_num' => $comment_num,
                'notices' => $notices,
                    ));
        }
        
        public function actionLogout() {
            Yii::app()->user->logout();
            $this->redirect(array('index/index'));
            //$this->redirect(Yii::app()->homeUrl);
            //这里设置默认的siteController
        }
       
    }
