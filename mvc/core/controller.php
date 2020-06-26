<?php
    class Controller{
        public function requireModel($model){
            require_once './mvc/models/'.$model.'.php';
            return new $model;
        }
        public function view($view,$arr=[]){
            require_once './mvc/views/'.$view.'.php';    
        }

    }
?>