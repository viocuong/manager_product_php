<?php
class ajax extends Controller
{
    function checkuser()
    {
        $user = $_POST['ur'];
        echo $this->requireModel("accountModel")->checkAcount($user);
    }
    function viewAllProduct($dt)
    {
        $data=[];
        if (!empty($dt)) $data = json_decode($dt,true);
        else {
            $res = $this->requireModel("productModel")->getAllProduct();
            $data = json_decode($res, true);
        }
        $this->viewajax('listproduct', ['title' => 'Các sản phẩm', 'data' => $data]);
    }
    function addProduct()
    {
        $data = $this->requireModel('productModel')->getAllCagerories();
        $this->viewajax('addproduct', ['cagetories' => $data]);
    }
    function proceedAddProduct()
    {
        $img = $_POST['fn'];
        $idcagetories = $_POST['ct'];
        $name = $_POST['np'];
        $price = $_POST['pr'];
        $quantity = $_POST['ql'];
        $sql = "insert into tbl_product(nameProduct,num,image,price,idCagetories) values('{$name}',{$quantity},'{$img}',{$price},{$idcagetories})";
        $this->requireModel("productModel")->query($sql);
        echo "<i style='color:#a8df65;font-size: 28px;' class='mt-3 fas fa-check-circle'> Thêm thành công sản phẩm {$name}</i>";
    }
    function upload()
    {
        $filename = $_FILES['file']['name'];
        $location = "./public/image/" . $filename;
        $uploadOk = 1;
        $imageFileType = pathinfo($location, PATHINFO_EXTENSION);

        /* Valid Extensions */
        $valid_extensions = array("jpg", "jpeg", "png");
        /* Check file extension */
        if (!in_array(strtolower($imageFileType), $valid_extensions)) {
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo 0;
        } else {
            /* Upload file */
            if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
                echo $location;
            } else {
                echo 0;
            }
        }
    }
    function searchproduct()
    {
        $sql="select * from tbl_product where nameProduct like '%{$_POST['ct']}%'";
        $data=$this->requireModel("productModel")->getProduct($sql);
        $res=[];
        $res=json_decode($data,true);
        $this->viewajax('listproduct', ['title' => "Các sản phẩm cho từ khóa '{$_POST['ct']}'", 'data' => $res]);

    }
    function detaiProduct($idproduct){
        if(!empty($idproduct)){
            $id=$idproduct;
        } 
        else $id= $_POST['id'];
        
        $res=json_decode($this->requireModel("productModel")->getAProduct($id),true);
        //print_r($res) ;
        $money=Functions::parse($res[0]['price']);
        $this->viewajax('detailproduct', ['title' => "Chi tiết sản phẩm", 'data' => $res]);
    }
    function deleteproduct(){
        $idprd=$_POST['prd'];
        $this->requireModel("productModel")->delete($idprd);
        echo "<script> alert('Xóa sản phẩm thành công'); </script>";
        $this->viewAllProduct("");

    }
    function proceedEditProduct(){
        $name = $_POST['np'];
        $price = $_POST['pr'];
        $quantity = $_POST['ql'];
        $id=$_POST['idpro'];
        $sql = "update tbl_product set nameProduct='{$name}',price={$price},num={$quantity} where idProduct={$id}";
        echo "<script> document.getElementsByTagName('BODY')[0].removeAttribute('class');</script>";
        echo "<script> document.getElementsByClassName('modal-backdrop fade show')[0].removeAttribute('class');</script>";
        
        $this->requireModel("productModel")->query($sql);
        echo "<script> alert('Sửa sản phẩm thành công')</script>";
        $this->detaiProduct($id);


    }
}
