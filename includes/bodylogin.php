<body class="container">
    <div class="row main justify-content-center">
        <div class="col-md-6 rounded main-conten p-5 m-5">
            <form action='./login' method="POST">
                <div class="form-group">
                    <label for="inpUser">Tên tài khoản</label>
                    <input type="text" class="form-control" name="user">
                </div>
                <div class="form-group">
                    <label for="inpPass">Mật khẩu</label>
                    <input type="password" class="form-control" name="pass">
                </div>
                <button type="submit" class="btn btn-danger">Đăng nhập</button>
                <a href="register.php" style="color: red;text-decoration: none;" class="ml-3"> Chưa có tài khoản, đăng ký ngay</a>
            </form>
        </div>
    </div>
</body>