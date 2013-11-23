<?php

class AnnouncementController extends Controller
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
        
	public function actionIndex()
	{
        $total_records = Announcement::model()->count();
        if(!isset($_GET['page'])) {
            $_GET['page'] = 1;
        }
        $page_info = $this->paging($total_records, $_GET['page'], 0, 18);
        $total_page = $page_info['total_page'];
        $cur_page = $page_info['cur_page'];
        $announcements = Announcement::model()->findAll(array('order' => 'create_time desc', 'limit' => 18, 'offset' => ($cur_page - 1)*18 ));
		$this->render('index', array(
            'announcements' => $announcements,
            'total_page' => $total_page,
            'cur_page' => $cur_page,
        ));
	}
    
    public function actionDelete() {
        if(isset($_GET['id'])) {
            Announcement::model()->deleteByPk($_GET['id']);
        }
        $this->redirect(array('announcements/index'));
    }
    public function actionAdd() {
        if(isset($_POST['content'])) {
            $model = new Announcement;
            $model->content = $_POST['content']; 
            $model->publisher = Yii::app()->user->name;
            $model->create_time = date('Y-m-d H:i:s');
            $model->validate();
            if($model->save()) {
                $this->redirect(array('announcement/index'));
            } else {
                $this->errors = $this->assembleErrors($model ->getErrors());
            }
        }
        $this->render('add', array(
            'errors' => $this->errors,
        ));
    }
}