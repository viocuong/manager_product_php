<?php
class ajax extends Controller
{
    function checkuser()
    {
        $user = $_POST['ur'];
        echo $this->requireModel("accountModel")->checkAcount($user);
    }
    function viewAllProduct()
    {
        $data = [];

        $res = $this->requireModel("productModel")->getAllProduct();
        $data = json_decode($res, true);

        $this->viewajax('listproduct', ['title' => 'Các sản phẩm', 'data' => $data]);
    }
    function addProduct()
    {
        $data = $this->requireModel('productModel')->getAllCagerories();
        $this->viewAjax('addProduct', ['cagetories' => $data]);
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
        $sql = "select * from tbl_product where nameProduct like '%{$_POST['ct']}%'";
        $data = $this->requireModel("productModel")->getProduct($sql);
        $res = [];
        $res = json_decode($data, true);
        $this->viewAjax('listproduct', ['title' => "Các sản phẩm cho từ khóa '{$_POST['ct']}'", 'data' => $res]);
    }
    function detaiProduct($idproduct)
    {
        if (!empty($idproduct)) {
            $id = $idproduct;
        } else $id = $_POST['id'];

        $res = json_decode($this->requireModel("productModel")->getAProduct($id), true);
        //print_r($res) ;
        $money = Functions::parse($res[0]['price']);
        $this->viewAjax('detailproduct', ['title' => "Chi tiết sản phẩm", 'data' => $res]);
    }
    function deleteproduct()
    {
        $idprd = $_POST['prd'];
        $this->requireModel("productModel")->delete($idprd);
        echo "<script> alert('Xóa sản phẩm thành công'); </script>";
        $this->viewAllProduct("");
    }
    function proceedEditProduct()
    {
        $name = $_POST['np'];
        $price = $_POST['pr'];
        $quantity = $_POST['ql'];
        $id = $_POST['idpro'];
        $sql = "update tbl_product set nameProduct='{$name}',price={$price},num={$quantity} where idProduct={$id}";
        echo "<script> document.getElementsByTagName('BODY')[0].removeAttribute('class');</script>";
        echo "<script> document.getElementsByClassName('modal-backdrop fade show')[0].removeAttribute('class');</script>";

        $this->requireModel("productModel")->query($sql);
        echo "<script> alert('Sửa sản phẩm thành công')</script>";
        $this->detaiProduct($id);
    }
    function product(){
        $this->view('mainproduct');
    }
    function clientpage(){
        $this->view('mainproductclient');
    }
    function searchproductclient(){
        $sql = "select * from tbl_product where nameProduct like '%{$_POST['ct']}%'";
        $data = $this->requireModel("productModel")->getProduct($sql);
        $res = [];
        $res = json_decode($data, true);
        $this->viewAjax('listproductclient', ['title' => "Các sản phẩm cho từ khóa '{$_POST['ct']}'", 'data' => $res]);
    }
    function detaiProductClient(){
        if (!empty($idproduct)) {
            $id = $idproduct;
        } else $id = $_POST['id'];

        $res = json_decode($this->requireModel("productModel")->getAProduct($id), true);
        //print_r($res) ;
        $money = Functions::parse($res[0]['price']);
        $this->viewAjax('detailproductclient', ['title' => "Chi tiết sản phẩm", 'data' => $res]);
    }
    function viewAllProductClient(){
        $data = [];

        $res = $this->requireModel("productModel")->getAllProduct();
        $data = json_decode($res, true);

        $this->viewAjax('listproductclient', ['title' => 'Các sản phẩm', 'data' => $data]);
    }
    function proceedaddcart(){
        $name = $_POST['np'];
        $price = $_POST['pr'];
        $quantity = $_POST['ql'];
        $id = $_POST['idpro'];
        $img='./public/image/'.$_POST['img'];
        $i=$_SESSION['numcart'];
        echo "<script> document.getElementsByTagName('BODY')[0].removeAttribute('class');</script>";
        echo "<script> document.getElementsByClassName('modal-backdrop fade show')[0].removeAttribute('class');</script>";
        $_SESSION['numcart']=$i+1;
        $_SESSION['client'][$i]=['name'=>$name,'price'=>$price,'num'=>$quantity,'id'=>$id,'img'=>$img];
        $this->viewAllProductClient();
    }
    function viewcart(){
        $this->viewAjax('cart');   
    }
    function deleteorder(){
        $sosp=$_SESSION['sosp']-1;
        $_SESSION['sosp']=$sosp;
        $idorder=$_POST['id'];
        $total=$_SESSION['total']-$_SESSION['client'][$idorder]['price']*$_SESSION['client'][$idorder]['num'];
        $_SESSION['total']=$total;
        $tongvnd=Functions::parse($total);
        unset($_SESSION['client'][$idorder]);
        echo "
        <div class='row d-flex justify-content-center border-bottom pb-3'>
                <h4 class='font-weight-bold'>Tổng đơn hàng</h4>
            </div>
            <div class='row p-3 border-bottom justify-content-center'>
                <h5>
                    sản phẩm: {$sosp}
                </h5>
            </div>
            <div class='row p-3 justify-content-center'>
                <h5>Tổng tiền: {$tongvnd}</h5>
            </div>
            <button class='w-100 rounded-pill d-flex justify-content-center btn btnrounded p-2'>Tiến hành thanh toán</button>";
    }
    function updatenumcart(){
        echo count($_SESSION['client']);
    }
}
