<?php
    class orderModel extends DataBase{
        function getAllOrder(){
            $data=[];
            $res=$this->conn->query("select tbl_order.*,tbl_product.nameProduct,tbl_product.price from tbl_order,tbl_product where tbl_order.id_product=tbl_product.idProduct");
            $i=0;
            if($res->num_rows>0){
                while($dt =$res->fetch_assoc()){
                    $data[$i++]=$dt;
                }
            }
            return $data;
        }
        function deleteorder($id){
            $this->conn->query("delete from tbl_order where id_order={$id}");
        }
        function setStatusSend($id){
            $this->conn->query("update tbl_order set statusShip=1 where id_order={$id}");
        }
        function setStatusPay($id){
            $this->conn->query("update tbl_order set statusPay=1 where id_order={$id}");
        }
        function getyetsend(){
            $res=$this->conn->query("select statusShip from tbl_order where statusShip=0");
            return $res->num_rows;
        }
        function getyetpay(){
            $res=$this->conn->query("select statusPay from tbl_order where statusPay=0");
            return $res->num_rows;
        }
        function getAllOrderYetSend(){
            $data=[];
            $res=$this->conn->query("select tbl_order.*,tbl_product.nameProduct,tbl_product.price from tbl_order,tbl_product where tbl_order.id_product=tbl_product.idProduct and statusShip=0");
            $i=0;
            if($res->num_rows>0){
                while($dt =$res->fetch_assoc()){
                    $data[$i++]=$dt;
                }
            }
            return $data;
        }
        function getAllOrderYetPay(){
            $data=[];
            $res=$this->conn->query("select tbl_order.*,tbl_product.nameProduct,tbl_product.price from tbl_order,tbl_product where tbl_order.id_product=tbl_product.idProduct and statusPay=0");
            $i=0;
            if($res->num_rows>0){
                while($dt =$res->fetch_assoc()){
                    $data[$i++]=$dt;
                }
            }
            return $data;
        }
        function getOrder($sql){
            $data=$this->conn->query($sql);
            $res=[];
            $count=0;
            if($data->num_rows>0){
                while($dt=$data->fetch_assoc()){
                    $res[$count]=$dt;
                    $count++;
                }
            }
            return json_encode($res,JSON_FORCE_OBJECT);
        }
    }
?>