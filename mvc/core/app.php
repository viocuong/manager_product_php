<?php
    class App{
        //localhost/appql/home/hello/123
        protected $controller='homepage';
        protected $action='default';
        protected $param=[];
        function __construct()
        {
             $arr=$this->processUrl();
             //controller
             if(isset($arr[0])){
                if(file_exists("./mvc/controllers/{$arr[0]}.php")){
                    $this->controller=$arr[0];
                 }
             }
             //action
             require_once './mvc/controllers/'.$this->controller.'.php';
             $this->controller=new $this->controller;
             if(isset($arr[1])){
                if(method_exists($this->controller,$arr[1])){
                    $this->action=$arr[1];
                }
            }
             //param
             if(isset($arr)){
                if(sizeof($arr)>2){
                    for($i=2;$i<sizeof($arr);$i++){
                        array_push($this->param,$arr[$i]);
                    }
                }
                else array_push($this->param,"");
             }
             call_user_func_array([$this->controller,$this->action],$this->param);
        }
        public function processUrl(){
            if(isset($_GET['url'])){
                return explode("/",filter_var($_GET['url']),FILTER_SANITIZE_URL);
            }
        }
    }
?>