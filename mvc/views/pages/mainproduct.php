<div class="row justify-content-around bg-light rounded-lg shadow-lg mt-5 p-5">
    <a href="#" class="btn btn-info col-md-3 mt-5 mb-5 rounded-lg m-1">
        <div class="row p-4 justify-content-center">
            Thêm sản phẩm
        </div>
        <div class="row p-3 bd d-flex justify-content-between m-0">
            xem chi tiết
            <div class="justify-content-end">
                <i class="fas fa-arrow-circle-right"></i>
            </div>
        </div>
    </a>
    <a id="viewproduct" href="./product" class="btn btn-dark col-md-3 mt-5 mb-5 rounded-lg m-1">
        <div class="row p-4 justify-content-center">
            Xem sản phẩm
        </div>
        <div class="row p-3 bd d-flex justify-content-between m-0">
            xem chi tiết
            <div class="justify-content-end">
                <i class="fas fa-arrow-circle-right"></i>
            </div>
        </div>
    </a>
    <a href="#" class="btn btn-danger col-md-3 mt-5 mb-5 rounded-lg m-1">
        <div class="row p-4 justify-content-center">
            Tiện ích
        </div>
        <div class="row p-3 bd d-flex justify-content-between m-0">
            xem chi tiết
            <div class="justify-content-end">
                <i class="fas fa-arrow-circle-right"></i>
            </div>
        </div>
    </a>
    
</div>
<div id="bodyproduct" class="clblack mt-5 row justify-content-around bg-light rounded-lg shadow-lg mt-5 p-5">
    <div class="col-3 bg-dark p-2">
        <div class="row ">
            <img src="./public/image/quanauxanh.jpg" alt="" height="350" width="300">
        </div>
        <div  class="row">
            quần âu xanh
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#viewproduct").click(function(){
            $.post("")
        });
    });
</script>