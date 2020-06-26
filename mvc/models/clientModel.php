<?php
    class clientModel extends DataBase{
        public function getAllListOrder($user){
        $result=$this->conn->query("SELECT tb_account.userName,tb_order.id_order,tb_order.content,tb_order.date,tb_order.price,tb_order.status_tranport,tb_order.status_pay,tb_order.link_fb from tb_order,tb_account where tb_order.userName=tb_account.userName and tb_order.userName='{$user}'");
            return $result;
        }
        public function getListUnsent($user){
            $result=$this->conn->query("SELECT tb_account.userName,tb_order.id_order,tb_order.content,tb_order.date,tb_order.price,tb_order.status_tranport,tb_order.status_pay,tb_order.link_fb from tb_order,tb_account where tb_order.userName=tb_account.userName and tb_order.userName='{$user}' and tb_order.status_tranport=1");
            return $result;
        }
        public function getListYetPay($user){
            $result=$this->conn->query("SELECT tb_account.userName,tb_order.id_order,tb_order.content,tb_order.date,tb_order.price,tb_order.status_tranport,tb_order.status_pay,tb_order.link_fb from tb_order,tb_account where tb_order.userName=tb_account.userName and tb_order.userName='{$user}' and tb_order.status_pay=1");
            return $result;
        }
        public function excute($sql){
            $this->conn->query($sql);
        }
        public function isClient($user){
            $result=$this->conn->query("SELECT lever FROM tb_account where userName='{$user}' and lever=2");
            return $result->num_rows>0;
        }
        public function getNotices($user){
            $unsent=$yetpay=0;
            $data=$this->conn->query("SELECT tb_account.userName,tb_order.id_order,tb_order.content,tb_order.date,tb_order.price,tb_order.status_tranport,tb_order.status_pay,tb_order.link_fb from tb_order,tb_account where tb_order.userName=tb_account.userName and tb_order.userName='{$user}'");
            if($data->num_rows>0){
                while($row=$data->fetch_assoc()){
                    if($row['status_tranport']==1) $unsent++;
                    if($row['status_pay']==1) $yetpay++;
                }
            }
            $ans=[];
            $ans['usent']=$unsent;
            $ans['upay']=$yetpay;
            return $ans;
        }
        public function getSearch($str,$user){
            $id=$str;
            $str="%{$str}%";
            if($stmt=$this->conn->prepare("SELECT tb_account.userName,tb_order.id_order,tb_order.content,tb_order.date,tb_order.price,tb_order.status_tranport,tb_order.status_pay,tb_order.link_fb from tb_order,tb_account where (tb_order.userName=tb_account.userName and tb_order.userName='{$user}') and(tb_order.id_order=? or tb_order.userName like ? or tb_order.date like ? or tb_order.link_fb like ? or tb_order.content like ?)")){
                $stmt->bind_param("issss",$id,$str,$str,$str,$str);
                $stmt->execute();
                $result=$stmt->get_result();
                $stmt->fetch();
                $stmt->close();
                return $result;
            }
        }
        public function getListOrder($user){
            $result=$this->conn->query("SELECT tb_account.userName,tb_order.id_order,tb_order.status_tranport,tb_order.status_pay from tb_order,tb_account where tb_order.userName=tb_account.userName and tb_order.userName='{$user}'");
            return $result;
        }
        public function createorder($content,$price,$linkfb,$user){
            $stmt=$this->conn->prepare("insert into tb_order(content,price,link_fb,userName) VALUES(?,?,?,?)");
            $stmt->bind_param("sdss",$content,$price,$linkfb,$user);
            $stmt->execute();
            $stmt->close();
        }
    }
