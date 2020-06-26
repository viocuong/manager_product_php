<?php
    class productModel extends DataBase{
        function getAllProduct(){
            $data=$this->conn->query("select * from tbl_product");
            $res=[];
            if($data->num_rows>0){
                while($dt=$data->fetch_assoc()){
                    $res[]=$dt;
                }
            }
            return json_encode($res,JSON_FORCE_OBJECT);
        }
    }
?>