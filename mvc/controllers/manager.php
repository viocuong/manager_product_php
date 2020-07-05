<?php
    class manager extends Controller{
        protected $md;
        protected $user;
        protected $lever;
        function __construct()
        {
            $this->md=$this->requireModel("homepageModel");
            if(empty($_SESSION['user'])){
                header('Location:./login');
            }
            else{
                $this->user=$_SESSION['user'];
            }
        }
        function default(){
            $this->view('layout',['page'=>'manager']);
        }
    }
?>