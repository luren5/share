<?php
    class RedisStorage {
        static public $instance = null;
        
        const HOST = '127.0.0.1';
        const PORT = 6379;

        static public function getInstance() {
            if(is_null(self::$instance)) {
                self::$instance = new Redis();
                self::$instance->connect(self::HOST, self::PORT);
            }
            return self::$instance;
        }
        
    }

