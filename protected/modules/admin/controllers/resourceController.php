<?php

class ResourceController extends Controller
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
                'actions'=> array('index', 'add', 'delete', 'update'),
                'users' => array('@'),
            ),
            array(
                'deny',
                'actions'=> array('index', 'add', 'delete', 'update'),
                'users' => array('*'),
            ),

        );
    }
    
    public function actionIndex() {
        $total_records = Resource::model()->count();
        if(!isset($_GET['page'])) {
            $_GET['page'] = 1;
        }
        $page_info = $this->paging($total_records, $_GET['page'], 0, 18);
        $total_page = $page_info['total_page'];
        $cur_page = $page_info['cur_page'];
        $resources = Resource::model()->findAll(array('order' => 'create_time desc', 'limit' => 18, 'offset' => ($cur_page - 1)*18 ));
       
        $this->render('index', array(
            'resources' => $resources,
            'cur_page' => $cur_page,
            'total_page' => $total_page,
        ));
    }
    
    public function actionUpdate() {
        
    }
    public function actionDelete() {
        if(isset($_GET['id'])) {
            Resource::model()->deleteByPk($_GET['id']);
        }  
        $this->redirect(array('resource/index'));
    }
}