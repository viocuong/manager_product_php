<?php
    class loginModel extends DataBase{
        public function getAccount($user,$pass){
            $result= $this->conn->query("select * from tbl_account where userName='".$user."' and passWord='".$pass."'");
            return $result->fetch_assoc();

        }
        public function insert($user,$pass,$email){
            $this->conn->query("'insert into tbl_account(userName,passWord,email,lever) values('.$user.','{$pass}',{$email},2)");
        }
        public function checkExist($uername){
            $result=$this->conn->query("select * from tbl_account where username='{$uername}'");
            return $result->num_rows>0;
        }
        public function excute($stringQuery)
        {
            return $this->conn->query($stringQuery);
        }
        public function getData($user,$pass){
            $result=$this->conn->query("select * from tbl_account where userName='{$user}' and passWord='{$pass}'" );
            $data=$result->fetch_assoc();
            return $data;
        }
    }
?>