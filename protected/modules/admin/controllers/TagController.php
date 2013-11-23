<?php
    class TagController extends Controller
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
        public function actionIndex() {
            $tags = Tags::model()->findAll();
            $this->renderPartial('index', array(
                'tags' => $tags,
            ));

        }
        
        public function actionAdd() {
            
        }
        
        public function actionDelete() {
            
        }
    }