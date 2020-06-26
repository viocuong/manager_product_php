<?php
    class accountModel extends DataBase{
        function getInfoAccount($user){
            $res=$this->conn->query("select * from tbl_account where userName='".$user."'");
            $data=array();
            if($res->num_rows>0){
                while($dt=$res->fetch_assoc()){
                    $data['account']=$dt;
                }
            }
            return json_encode($data,JSON_FORCE_OBJECT);
        }
        function checkAcount($user){
            if(empty($user)) return "Không được để trống";
            if(!preg_match("/^[a-zA-Z0-9]+$/",$user)) return "Tài khoản chỉ gồm các chữ cái và số";
            if($this->conn->query("select userName from tbl_account where userName='".$user."'")->num_rows>0) return "Tài khoản đã tồn tại";
            return "<span style='color:#79d70f'><i class='fas fa-check'></i></span>";

        }
    }
?>