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
            $this->render('index', array('errors' => $this->errors));
        }

    }
