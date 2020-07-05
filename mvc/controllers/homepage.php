<?php
    class homepage extends Controller{
        protected $md;
        protected $user;
        protected $lever;
        function __construct()
        {
            
        }
        function default(){
            $this->view('layout',['page'=>'homepage']);
        }
    }
?>