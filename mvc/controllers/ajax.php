<?php
    class ajax extends Controller{
        function checkuser(){
            $user=$_POST['ur'];
            echo $this->requireModel("accountModel")->checkAcount($user);
        }
        function viewAllProduct(){
            $res=$this->requireModel("productModel")->getAllProduct();
            $data=json_decode($res,true);
            foreach($data as $key=>$value){
                
            }
        }
    }
?>