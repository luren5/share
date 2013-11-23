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
    }