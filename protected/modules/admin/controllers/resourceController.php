<?php

class ResourceController extends Controller
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
        
        $resources = Resource::model()->findAll();
        $this->renderPartial('index', array(
            'resources' => $resources,
        ));
    }
    
    public function actionAdd() {
        
    }
    
    public function actionUpdate() {
        
    }
}