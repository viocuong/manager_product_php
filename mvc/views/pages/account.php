<div class="row justify-content-around bg-light rounded-lg shadow-lg mt-5 p-5">
    <div class="card w-100 clblack">
        <div class="card-header">
            <h2>Thông tin tài khoản</h2>
        </div>
        <div class="card-body p-3">
            <h4 class="m-4">Tài khoản: 
                <?php echo $arr['data']['account']['userName'];?>
            </h4>
            <h4 class="m-4">Mật khẩu:
                <input readonly class="input" type="password" placeholder="*******">
            </h4>
            <h4 class="m-4">Email:
                <?php echo $arr['data']['account']['email'];?>
            </h4>
            <h4 class="m-4">Loại tài khoản:
                <?php
                    $lever=$arr['data']['account']['lever'];
                    if($lever==1) echo "admin";
                    else echo "Nhân viên";
                ?>
            </h4>

            <a href="./logout" class="m-4 btn btn-primary">Đăng xuất</a>
        </div>
    </div>

</div>