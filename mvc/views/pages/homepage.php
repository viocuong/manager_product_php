<div class="row justify-content-around bg-light rounded-lg shadow-lg mt-5 p-5" style="color:#383e56;">
    <h1 class="font-weight"><i class="far fa-hand-spock"></i> Chào mừng đến với trang quản lý sản phẩm <i class="far fa-hand-spock"></i></h1>
    <div class="col-12 p-5">
        <h5 style="color:#e84a5f;">Các tính năng, hoạt động của trang</h5>
        <p>1. Trang hoạt động dựa trên ajax</p>
        <p>2. Giúp admin quản lý sản phẩm: thêm sửa xóa sản phẩm</p>
        <p>3. Có tài khoản nhân viên để xem sản phẩm,tìm kiếm sản phẩm, xuất sản phẩm trực tiếp tại cửa hàng cho khách</p>
        <p>4. Trang có thể hoạt động như một shop online giúp chủ doanh nghiệp tiết kiệm chi phí, và đơn giản hóa quản lý</p>
        <p>5. Khách hàng vào trang không yêu cầu tài khoản, có thể xem sản phẩm và tiến hành mua</p>
        <p>6. Dựa vào đánh giá sản phẩm của khách hàng, chủ doanh nghiệp có thể có kế hoạch cho từng loại sản phẩm</p>

    </div>
</div>
<div class="row justify-content-around bg-light rounded-lg shadow-lg mt-5 p-5">
    <div class="row w-100 justify-content-center">
        <i style="color: #40bad5; font-size: 48px;" class="fas fa-tachometer-alt"></i>
    </div>
    <a id="clientpage" class="btn btn-info col-md-3 mt-5 mb-5 rounded-lg m-1">
        <div class="row p-4 justify-content-center">
            Bạn là khách
        </div>
        <div class="row p-3 bd d-flex justify-content-center m-0">
            <i style="font-size: 32px;" class="fas fa-user"></i>
        </div>
    </a>
    <a id="managerpage"  class="btn btn-info col-md-3 mt-5 mb-5 rounded-lg m-1">
        <div class="row p-4 justify-content-center">
            Bạn là người trong hệ thống
        </div>
        <div class="row p-3 bd d-flex justify-content-center m-0">
            <i style="font-size:32px;" class="fas fa-user-cog"></i>
        </div>
    </a>
</div>
<script>
    $(document).ready(function(){
        $("#managerpage").click(function(){
            var user='<?php if(isset($_SESSION['user'])) echo $_SESSION['user']; else echo '';?>';
            if(user =='') alert('không có quyền truy cập, vui lòng đăng nhập');
            else{
                $.post('./ajax/product',function(data){
                    $("#mainhome").html(data);
                });
            }
        });
        $("#clientpage").click(function(){
            var user='<?php if(isset($_SESSION['user'])) echo $_SESSION['user']; else echo '';?>';
            if(user != '') alert("Chỉ dành cho khách hàng");
            else{
                $.post('./ajax/clientpage',function(data){
                    $("#mainhome").html(data);
                });
            }
        });
    });
</script>