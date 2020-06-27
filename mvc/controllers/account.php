<?php 
    class account extends Controller{
        protected $user;
        protected $md;
        function __construct()
        {
            $this->md=$this->requireModel("accountModel");
            if(empty($_SESSION['user'])){
                header('Location:./login');
            }
            else{
                $this->user=$_SESSION['user'];
            }
        }
        function default($param){
            $res= $this->md->getInfoAccount($this->user);
            $data=json_decode($res,true);
            $this->view('layout',['page'=>'account','data'=>$data]);
        
        }
        
    }
?>
