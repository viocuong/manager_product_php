<?php
    class productModel extends DataBase{
        function query($stringQuery)
        {
            $this->conn->query($stringQuery);
        }
        function getProduct($sql){
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
        function getAllProduct(){
            $data=$this->conn->query("select * from tbl_product");
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
        function getAllCagerories(){
            $res=$this->conn->query("select * from tbl_cagetories");
            $data=[];
            $count=0;
            if($res->num_rows>0){
                while($dt=$res->fetch_assoc()){
                    $data[$count]=$dt;
                    $count++;
                }   
            }
            return $data;
        }
        function getAProduct($id){
            $res=$this->conn->query("select * from tbl_product where idProduct={$id}");
            $data=[];
            if($res->num_rows>0){
                $data[0]=$res->fetch_assoc();
            }
            return json_encode($data,JSON_FORCE_OBJECT);
        }
        function delete($id){
            $this->conn->query("delete from tbl_product where idProduct={$id}");
        }
    }
?>