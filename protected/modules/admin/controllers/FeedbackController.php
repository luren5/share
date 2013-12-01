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
                    if(!$user) {
                        $this->errors['找不到该用户的邮件地址'] = 'false';
                    } else {
                        $mail = Yii::createComponent('application.extensions.mailer.EMailer');
                        $mail->IsSMTP();                                      // set mailer to use SMTP
                        $mail->Host = "smtp.163.com";  // specify main and backup server
                        $mail->SMTPAuth = true;     // turn on SMTP authentication
                        $mail->Username = "hgdshare@163.com";  // SMTP username
                        $mail->Password = "hgdonline"; // SMTP password
                        $mail->From = "hgdshare@163.com";
                        $mail->FromName = "湖工大爱分享网";
                        $mail->AddAddress($user[0]->email, "收件人");                 // name is optional
                        $mail->Subject = "来自湖工大分享网的回复";
                        $mail->Body    = $_POST['feedback_reply']['reply_content'];
                        $result = $mail->Send();
                        if($result === true) {
                            $model = new FeedbackReply;
                            $model->feedback_id = $_POST['feedback_reply']['feedback_id'];
                            $model->reply_content = $_POST['feedback_reply']['reply_content'];
                            $model->reply_from = Yii::app()->user->name;
                            $model->reply_to = $_POST['feedback_reply']['reply_to'];
                            $model->reply_to_email = $user[0]->email;
                            $model->create_time = date('Y-m-d H:i:s');
                            $model->validate();
                            if($model->save()) {
                                $this->errors['回复成功,可去回复列表中查看所有回复记录!'] = true;
                            } else {
                                $this->errors = $this->assembleErrors($model ->getErrors());
                            }
                        } else {
                            $this->errors['邮件发送失败'] = false;
                        }
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
            if(!isset($_GET['page'])) {
                $_GET['page'] = 1;
            }
            $total_records = FeedbackReply::model()->count();
            $page_info = $this->paging($total_records, $_GET['page'], 0, 18);
            $total_page = $page_info['total_page'];
            $cur_page = $page_info['cur_page'];
            
            $replys = FeedbackReply::model()->findAll(array('order' => 'create_time desc', 'limit' => 18, 'offset' => ($cur_page - 1)*18 ));
            $this->render('replyList', array(
                'replys' => $replys,
                'cur_page' => $cur_page,
                'total_page' => $total_page,
            ));
        }     
    }
    