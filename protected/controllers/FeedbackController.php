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
                    array_push($this->errors, '谢谢您宝贵的意见，我们会继续努力，做的更好！');
                }
            }
            $this->render('index', array('errors' => $this->errors));
        }

    }
