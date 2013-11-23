<?php
    class AdministratorController extends Controller
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
            $administrators = Administrator::model()->findAll();
            $this->renderPartial('index', array(
                'administrators' => $administrators,
            ));
        }
        
        public function actionAdd() {
            
        }
    }