<?php
    class redirect extends Controller{
        public function check($id){
            if($id=="d033e22ae348aeb5660fc2140aec35850c4da997"){
                $_SESSION['user']="admin";
                header("Location:http://{$GLOBALS['HOST']}/webapp/admin/default/unsent");
            }
            else header("Location:http://{$GLOBALS['HOST']}/webapp/login");
        }
    }
?>