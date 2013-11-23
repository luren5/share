<?php
    class TagController extends Controller
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
                    'actions'=> array('index', 'add', 'delete'),
                    'users' => array('@'),
                ),
                array(
                    'deny',
                    'actions'=> array('index', 'add', 'delete'),
                    'users' => array('*'),
                ),

            );
        }
        public function actionIndex() {
            $total_records = Tags::model()->count();
            if(!isset($_GET['page'])) {
                $_GET['page'] = 1;
            }
            $page_info = $this->paging($total_records, $_GET['page'], 0, 18);
            $total_page = $page_info['total_page'];
            $cur_page = $page_info['cur_page'];
            $tags = Tags::model()->findAll(array('order' => 'create_time desc', 'limit' => 18, 'offset' => ($cur_page - 1)*18 ));
            $this->render('index', array(
                'tags' => $tags,
                'cur_page' => $cur_page,
                'total_page' => $total_page,
            ));

        }
        
        public function actionAdd() {
            if(isset($_POST['tag'])) {
                $model = new Tags;
                $model->name = $_POST['tag']['name'];
                $model->status = 1;
                $model->create_time = date('Y-m-d H:i:s');
                $model->validate();
                if($model->save()) {
                    $this->redirect(array('tag/index'));
                } else {
                    $this->errors = $this->assembleErrors($model ->getErrors());
                }
            }
            $this->render('add', array(
               'errors' => $this->errors
            ));
        }
        
        public function actionDelete() {
            if(isset($_GET['id'])) {
                Tags::model()->deleteByPk($_GET['id']);
            }  
            $this->redirect(array('tag/index'));
        }
    }