<?php
    class IndexController extends Controller{
        
        function filters() {
            return array(
                'accessControl',
            );
        }
        
        function accessRules() {               
            return array(
                array(
                    'allow',
                    'actions'=>array('main', 'header', 'left', 'right'),
                    'users' => array('@'),
                ),
                array(
                    'deny',
                    'actions'=>array('main', 'header', 'left', 'right'),
                    'users' => array('*'),
                ),

            );
        }
        
        function actionHeader() {
            $this->renderPartial('header');
            
        }
        
        function actionLeft() {
            $this->renderPartial('left');
            
        }
        
        function actionRight() {
            
        }
        
        function actionMain() {
            $this->renderPartial('main');
            
        }
        
    }