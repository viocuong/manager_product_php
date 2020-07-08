<div class="row justify-content-around bg-light rounded-lg shadow-lg mt-5 p-5 mb-5">
    <div class="row w-100 justify-content-center">
        <i style="color: #40bad5; font-size: 48px;" class="fas fa-tachometer-alt"></i>
    </div>
    <a id="allorder" class="clsuccess btn btnorder bgwhite col-md-3 mt-5 mb-5 rounded-lg shadow-lg m-1">
        <div class="clsuccess row p-4 justify-content-center">
            Tất cả đơn
        </div>
        <div class="row p-3 bd d-flex justify-content-between m-0">
            <div class="clsuccess justify-content-center d-flex  w-100">
                <i style="font-size: 30px;" class="fas fa-receipt"></i>
            </div>
        </div>
    </a>
    <a id="allorderyetsend" class="clsuccess btn btnorder bgwhite col-md-3 mt-5 mb-5 rounded-lg shadow-lg m-1">
        <div class="clsuccess row p-4 justify-content-center">
            Đơn chưa gửi
        </div>
        <div class="row p-3 bd d-flex justify-content-between m-0">
            <div class="clsuccess justify-content-center d-flex  w-100">
                <i style="font-size: 30px;" class="fas fa-shipping-fast"></i>
                <div id='yetsend' class="mb-4 ml-2 p-1 bgpink rounded-circle" style="color: #ffffff;">

                </div>
            </div>

        </div>
    </a>
    <a id="allorderyetpay" class="clsuccess btn btnorder bgwhite col-md-3 mt-5 mb-5 rounded-lg shadow-lg m-1">
        <div class="clsuccess row p-4 justify-content-center">
            Đơn chưa thanh toán

        </div>
        <div class="row p-3 bd d-flex justify-content-between m-0">
            <div class="clsuccess justify-content-center d-flex  w-100">
                <i style="font-size: 30px;" class="fas fa-hand-holding-usd"></i>
                <div id='yetpay' class="ml-2 mb-4 p-1 bgpink rounded-circle" style="color: #ffffff;">

                </div>
            </div>
        </div>
    </a>
    <form class="row w-100 mb-5 md-form mt-0">
        <div class="input-group">
            <input id="inputsearchorder" type="text" class="form-control bg-light border-dark small" placeholder="Tìm kiếm đơn theo, tên sản phẩm, id đơn..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
</div>

<div id="listproduct">
</div>
<script>
    $(document).ready(function() {
        $.post("./ajax/getyetsend", function(data) {
            $("#yetsend").html(data);
        });
        $.post("./ajax/getyetpay", function(data) {
            $("#yetpay").html(data);
        });
        $.post("./ajax/allOrder", function(data) {
            $("#listproduct").html(data);
        });
        $("#allorder").click(function() {
            $.post('./ajax/allorder', function(data) {
                $("#listproduct").html(data);
            });
        });
        $("#allorderyetsend").click(function() {
            $.post('./ajax/allorderyetsend', function(data) {
                $("#listproduct").html(data);
            });
        });
        $("#allorderyetpay").click(function() {
            $.post('./ajax/allorderyetpay', function(data) {
                $("#listproduct").html(data);
            });
        });
        $("#inputsearchorder").keyup(function() {
            var content = $(this).val();
            $.post("./ajax/searchorder", {
                ct: content
            }, function(data) {
                $("#listproduct").html(data);
            });
        });

    });
</script>