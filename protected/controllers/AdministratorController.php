<?php
    class AdministratorController extends Controller
    {
        public function actionIndex() {
            $administrators = Administrator::model()->findAll();
            $this->renderPartial('index', array(
                'administrators' => $administrators,
            ));

        }

    }