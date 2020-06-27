<?php
    class productModel extends DataBase{
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
    }
?>