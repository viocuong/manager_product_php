<div class="row justify-content-around bg-light rounded-lg shadow-lg mt-5 p-5">
    <div class="row w-100 justify-content-center">

        <i style="color: #40bad5; font-size: 48px;" class="fas fa-tachometer-alt"></i>

    </div>
    <a id="addproduct" class="btn btncart col-md-3 mt-5 mb-5 rounded-lg m-1">
        <div class="row p-4 justify-content-center">
            </i>Nhập sản phẩm
        </div>
        <div class="row p-3 bd d-flex justify-content-between m-0">
            <div class="justify-content-center d-flex  w-100">
                <i style="font-size: 30px;" class="fas fa-plus"></i>
            </div>
        </div>
    </a>
    <a id="viewproduct" class="btn btncart col-md-3 mt-5 mb-5 rounded-lg m-1">
        <div class="row p-4 justify-content-center">
            Xem sản phẩm
        </div>
        <div class="row p-3 bd d-flex justify-content-between m-0">
            <div class="justify-content-center w-100">
                <i style="font-size: 30px;" class="far fa-eye"></i>
            </div>
        </div>
    </a>
    <a id="order" class="btn btncart col-md-3 mt-5 mb-5 rounded-lg m-1">

        <div class="row p-4 justify-content-center">
            Đơn hàng
        </div>
        <div class="row p-3 bd d-flex justify-content-between m-0">
            <div class="justify-content-center w-100">
                <i style="font-size: 30px;" class="fas fa-file-invoice"></i>
            </div>
        </div>
    </a>

    <form class="row w-100 mb-5 md-form mt-0">
        <div class="input-group">
            <input id="inputsearch" type="text" class="form-control bg-light border-dark small" placeholder="Tìm kiếm sản phẩm..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>>
</div>
<div id="listproduct">
</div>
<script>
    $("#order").click(function(){
        $.post('./ajax/orderpage',function(data){
            $("#mainhome").html(data);
        });
    });
    $.post("./ajax/viewAllProduct", function(data) {
        $("#listproduct").html(data);
    });
    $("#inputsearch").keyup(function() {
        var content = $(this).val();
        $.post("./ajax/searchproduct", {
            ct: content
        }, function(data) {
            $("#listproduct").html(data);
        });
    });
    $(document).ready(function() {
        $("#userdk").keyup(function() {
            var user = $(this).val();
            $.post("./ajax/checkuser", {
                ur: user
            }, function(data) {
                $("#messuser").html(data);
            });
        });
        $("#viewproduct").click(function() {
            $.post("./ajax/viewAllProduct", function(data) {
                $("#listproduct").html(data);
            });
        });
        $("#addproduct").click(function() {
            $.post("./ajax/addProduct", function(data) {
                $("#listproduct").html(data);
            });
        });


    });
</script>