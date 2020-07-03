<div class="row justify-content-around bg-light rounded-lg shadow-lg mt-5 p-5">
    <div class="row w-100 justify-content-center">

        <i style="color: #40bad5; font-size: 48px;" class="fas fa-tachometer-alt"></i>

    </div>
    <a id="addproduct" class="btn btn-danger col-md-3 mt-5 mb-5 rounded-lg m-1 shadow-lg">
        <div class="row p-4 justify-content-center">
            </i>Nhập sản phẩm
        </div>
        <div class="row p-3 bd d-flex justify-content-between m-0">
            <div class="justify-content-center d-flex  w-100">
                <i style="font-size: 30px;" class="fas fa-plus"></i>
            </div>
        </div>
    </a>
    <a id="viewproduct" class="btn btn-danger col-md-3 mt-5 mb-5 rounded-lg shadow-lg m-1">
        <div class="row p-4 justify-content-center">
            Xem sản phẩm
        </div>
        <div class="row p-3 bd d-flex justify-content-between m-0">
            <div class="justify-content-center w-100">
                <i style="font-size: 30px;" class="far fa-eye"></i>
            </div>
        </div>
    </a>
    <a href="#" class="btn btn-danger col-md-3 mt-5 mb-5 rounded-lg m-1 shadow-lg">
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
    <div class="row w-100 mb-5 md-form mt-0">
        <input id="inputsearch" class="form-control" type="text" placeholder="Tìm kiếm sản phẩm" aria-label="Search">
        <div id="test" class="clblack">

        </div>
    </div>


</div>

<div id="listproduct">
</div>
<script>
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