<?php
    class FeedbackController extends Controller
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
        
        public function actionIndex() {
            if(isset($_POST['feedback'])) {
                if(!isset(Yii::app()->user->identity)) {
                    $this->errors['请先登录，并保证邮箱地址正确！'] = false;
                } else {
                    $model = new Feedback;
                    $model->attributes = $_POST['feedback'];
                    $model->create_time = date('Y-m-d H:i:s');
                    $model->messageBy = Yii::app()->user->name;
                    $model->validate();
                    if(!$model->save()) {
                        $this->errors = $this->assembleErrors($model ->getErrors());
                    } else {
                        $error_mes = '已收到您宝贵的意见，稍后将以邮件的方式回复您<br/>如果不确定邮箱是否正确，可进入用户中心查看并修改！';
                        $this->errors[$error_mes] = true;
                    }
                }
            }
            $this->render('index', array('errors' => $this->errors));
        }
        
        public function actionMobile() {
            if(empty($_GET['system'])) {
                echo json_encode(array('status' => 401, 'mes' => 'empty system'));
                exit;
            }
            
            if(empty($_GET['feedbackContent'])) {
                echo json_encode(array('status' => 402, 'mes' => 'feedback content empty'));
                exit;
            }
            
            if(empty($_GET['userEmail'])) {
                echo json_encode(array('status' => 403, 'mes' => 'user email empty'));
                exit;
            }
            
            $model = new FeedbackMobile;
            $model->user_email = $_GET['userEmail'];
            $model->feedback_content = $_GET['feedbackContent'];
            $model->system = $_GET['system'];
            $model->create_time = date("Y-m-d H:i:s");
            $model->validate();
            if($model->save()) {
                echo json_encode(array('status' => 200));
                exit;
            } else {
                echo json_encode(array('status' => 404, 'mes' => 'save data error'));
                exit;
            }
        }
    }
