<div class="row main justify-content-center p-5">
    <div class=" col-10 col-md-6 rounded pb-5 mb-5 m-md-5  shadow-lg rounded-sm">
        <div class="row d-flex justify-content-center p-3 headlogin">
            Đăng Nhập
        </div>
        <form action='./login' method="POST">
            <div class="form-group pt-3 pb-3">
                <label for="inpUser" class="clblack">Tên tài khoản</label>
                <input type="text" class="form-control" name="user">
            </div>
            <div class="form-group pt-3 pb-3">
                <label for="inpPass" class="clblack">Mật khẩu</label>
                <input type="password" class="form-control" name="pass">
            </div>
            <div style="color: red;"><?php echo $arr['error']; ?></div>
            <button type="submit" class="btn buttonlogin w-100 pt-2 pb-2 mb-3 mt-3">Login</button>
            <a href="register" style="color: red;text-decoration: none;" class="ml-3"> Chưa có tài khoản, đăng ký ngay</a>
        </form>
    </div>
</div>