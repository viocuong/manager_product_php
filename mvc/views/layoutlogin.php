<!DOCTYPE html>
<html lang="vi">
<head>
    <head>
        <?php include_once './includes/header.php';?>
    </head>
</head>
<body class="container bodyimg">
    <div class="container-fluid">
    <div class="row main justify-content-center  ">
        <div class=" col-10 col-md-6 rounded p-md-5 m-md-5 pt-5 pb-5 shadow-lg">
            <form action='./login' method="POST"  >
                <div class="form-group pt-3 pb-3">
                    <label for="inpUser">Tên tài khoản</label>
                    <input type="text" class="form-control" name="user">
                </div>
                <div class="form-group pt-3 pb-3">
                    <label for="inpPass">Mật khẩu</label>
                    <input type="password" class="form-control" name="pass">
                </div>
                <div style="color: red;"><?php echo $arr['error']; ?></div>
                <button type="submit" class="btn buttonlogin w-100 pt-2 pb-2 mb-3 mt-3">Đăng nhập</button>
                <a href="register" style="color: red;text-decoration: none;" class="ml-3"> Chưa có tài khoản, đăng ký ngay</a>
            </form>
        </div>
    </div>
    </div>
</body>

</html>