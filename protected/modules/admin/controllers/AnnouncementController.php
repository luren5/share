<?php

class AnnouncementController extends Controller
{
    
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
        $announcements = Announcement::model()->findAll();
		$this->renderPartial('index', array(
            'announcements' => $announcements,
        ));
	}
    
    public function actionDelete() {
        if(isset($_GET['id'])) {
            Announcement::model()->deleteByPk($_GET['id']);
        }
        $this->redirect(array('announcements/index'));
    }
    public function actionAdd() {
        
    }
}