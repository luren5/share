<?php
    class CommentController extends Controller
    {
        public function filters() {
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
            $comments = Comment::model()->findAll();
            $this->renderPartial('index', array(
                'comments' => $comments,
            ));

        }
        
        public function actionDelete() {
            
        }

    }