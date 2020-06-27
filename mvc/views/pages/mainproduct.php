<div class="row justify-content-around bg-light rounded-lg shadow-lg mt-5 p-5">

    <a href="#" class="btn btn-info col-md-3 mt-5 mb-5 rounded-lg m-1">
        <div class="row p-4 justify-content-center">
            </i>Thêm sản phẩm
        </div>
        <div class="row p-3 bd d-flex justify-content-between m-0">
            
            <div class="justify-content-center d-flex  w-100">
                <i style="font-size: 30px;" class="fas fa-plus"></i>
            </div>
        </div>
    </a>
    <a id="viewproduct" class="btn btn-dark col-md-3 mt-5 mb-5 rounded-lg m-1">
        <div class="row p-4 justify-content-center">
            Xem sản phẩm
        </div>
        <div class="row p-3 bd d-flex justify-content-between m-0">
            <div class="justify-content-center w-100">
                <i style="font-size: 30px;" class="far fa-eye"></i>
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
<div id="listproduct">
</div>
<script>
    $(document).ready(function() {
        $("#viewproduct").click(function() {
            $.post("./ajax/viewAllProduct", function(data) {
                $("#listproduct").html(data);
            });
        });
    });
</script>