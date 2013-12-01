<?php
    class CountPv{
        private $_query = null;
        private $_page = null;
        private $_other_param = null;
        private $_first_in = null;
        
        public function __construct($query_string) {
            $this->_query = $query_string;
        }
        
        private function isFirstIn() {
            if(isset(Yii::app()->session['firstIn'])) {
                $this->_first_in = false;
            } else {
                $this->_first_in = true;
                Yii::app()->session['firstIn'] = true;
            }
        }
        
        public function countPv() {
            $this->isFirstIn();
            $this->parseQuery();
            $this->savePv();
        } 
        
        private function parseQuery() {
            if(!$this->_query) {
                $this->$params['page'] = 'index/index';
            } else if(substr($this->_query, 0, 2) === 'r=') {
                $this->_query = substr($this->_query, 2);
                $parameters = explode('&', $this->_query);
                
                $this->_page = $parameters[0];
                unset($parameters[0]);
                $this->_other_param = implode(',', $parameters);
            }
        }
        
        private function savePv() {
            $model = new PvRecord();
            $model->page = $this->_page;
            $model->other_param = $this->_other_param;
            $model->visitor = Yii::app()->user->name;
            $model->first_in = $this->first_in;
            $model->ip = $_SERVER['REMOTE_ADDR'];
            $model->create_time = date('Y-m-d H:i:s');
            $model->validate();
            if($model->save()) {
                return true;
            } else {
                return false;
            }
        }   
    }