<?php
    class ManagerController extends Controller{
        public function actionLogin() {
            echo '我是管理员，你信吗？';
            $this->render('login');
        }
    }