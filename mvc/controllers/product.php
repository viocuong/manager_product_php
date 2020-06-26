<?php
    class product extends Controller{
        protected $md;
        function __construct()
        {
            $md=$this->requireModel("productModel");
        }
        function default(){
            $this->view('layout',['page'=>'mainproduct']);
        }
    }
?>