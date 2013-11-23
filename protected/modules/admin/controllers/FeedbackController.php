<?php
    class FeedbackController extends Controller
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
            $feedbacks = Feedback::model()->findAll();
            $this->renderPartial('index', array(
                'feedbacks' => $feedbacks,
            ));
        }
        
        public function actionDelete() {
            
        }
    }