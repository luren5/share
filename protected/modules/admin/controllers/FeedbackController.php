<?php
    class FeedbackController extends Controller
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
                    'actions'=> array('index', 'delete'),
                    'users' => array('@'),
                ),
                array(
                    'deny',
                    'actions'=> array('index', 'delete'),
                    'users' => array('*'),
                ),

            );
        }
        
        public function actionIndex() {
            $total_records = Feedback::model()->count();
            if(!isset($_GET['page'])) {
                $_GET['page'] = 1;
            }
            $page_info = $this->paging($total_records, $_GET['page'], 0, 18);
            $total_page = $page_info['total_page'];
            $cur_page = $page_info['cur_page'];
            $feedbacks = Feedback::model()->findAll(array('order' => 'create_time desc', 'limit' => 18, 'offset' => ($cur_page - 1)*18 ));
            $this->render('index', array(
                'feedbacks' => $feedbacks,
                'total_page' => $total_page,
                'cur_page' => $cur_page,
            ));
        }
        
        public function actionDelete() {
            
        }
        
        public function actionReply() {
            if(isset($_GET)) {
                if(isset($_POST['feedback_reply'])) {
                    $user = User::model()->findAllByAttributes(array('username'=> $_POST['feedback_reply']['reply_to']));     
                    if(!user) {
                        $this->errors['找不到该用户的邮件地址'] = 'false';
                    } else {
                        $message = 'Hello World!';
                        $mailer = Yii::createComponent('application.extensions.mailer.EMailer');
                        $mailer->Host = 'smtp.163.com';
                        $mailer->IsSMTP();
                        $mailer->From = '13307139608@163.com';
                        $mailer->AddReplyTo($replay_email);
                        $mailer->AddAddress('xhuan@hgdonline.net');
                        $mailer->FromName = '湖工大爱分享网';
                        $mailer->SMTPDebug = true;   //设置SMTPDebug为true，就可以打开Debug功能，根据提示去修改配置
                        $mailer->CharSet = 'UTF-8';
                        $mailer->Subject = '回复用户反馈';
                        $mailer->Body = $_POST['feedback_reply']['reply_content'];
                        $send_result = $mailer->Send();
                        var_dump($send_result);
                        die();
                    }
                
                    $model = new FeedbackReply;
                    $model->feedback_id = $_POST['feedback_reply']['feedback_id'];
                    $model->reply_content = $_POST['feedback_reply']['reply_content'];
                    $model->reply_to = $_POST['feedback_reply']['reply_to'];
                    $model->create_time = date('Y-m-d H:i:s');
                    $model->validate();
                    if($model->save()) {
                        //$this->redirect(array('feedback/relayList'));
                    } else {
                        print_r($model ->getErrors());
                        
                        $this->errors = $this->assembleErrors($model ->getErrors());
                        
                        
                    }
                }
                
                $this->render('reply', array(
                    'messageBy' => $_GET['messageBy'],
                    'title' => $_GET['title'],
                    'content' => $_GET['content'],
                    'feedback_id' => $_GET['id'],
                    'errors' => $this->errors,
                ));
                
                
            } else {
                $this->redirect('feedback/index');
            } 
        } 
        
        public function actionReplyList() {
            
        }
        
    }
    