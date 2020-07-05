<div class="row justify-content-around bg-light rounded-lg shadow-lg mt-5 p-5">
    <div class="row w-100 justify-content-center">

        <i style="color: #40bad5; font-size: 48px;" class="fas fa-tachometer-alt"></i>

    </div>
    <a id="viewproduct" class="btn btn-dark col-md-3 mt-5 mb-5 rounded-lg shadow-lg m-1">
        <div class="row p-4 justify-content-center">
            Xem sản phẩm
        </div>
        <div class="row p-3 bd d-flex justify-content-between m-0">
            <div class="justify-content-center w-100">
                <i style="font-size: 30px;" class="far fa-eye"></i>
            </div>
        </div>
    </a>
    <a id="viewcart" class="btn btn-dark col-md-3 mt-5 mb-5 rounded-lg m-1 shadow-lg">
        <div class="row p-4 justify-content-center">
            Giỏ hàng
        </div>
        <div class="row p-3 bd d-flex justify-content-between m-0">
            <div class="justify-content-center w-100 d-flex">
                <i style="font-size: 30px;" class="fas fa-shopping-cart"></i>
                <div id="numcart" class="ml-2 bg-danger p-2 rounded-circle">
                    <?php
                        if(isset($_SESSION['client'])) $_SESSION['numcart']=count($_SESSION['client']);
                        else $_SESSION['numcart']=0;
                        echo $_SESSION['numcart'];
                    ?>
                </div>
            </div>
        </div>
    </a>
    <form class="row w-100 mb-5 md-form mt-0 pt-5 pb-5">
        <div class="input-group">
            <input id="inputsearch" type="text" class="form-control bg-light border-dark small" placeholder="Tìm kiếm sản phẩm..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>


</div>

<div id="listproduct" class="pt-5 pb-5">
</div>
<script>
    $("#inputsearch").keyup(function() {
        var content = $(this).val();
        $.post("./ajax/searchproductclient", {
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
            $.post("./ajax/viewAllProductClient", function(data) {
                $("#listproduct").html(data);
            });
        });
        $("#viewcart").click(function(){
            $.post('./ajax/viewcart',function(data){
                $("#listproduct").html(data);
            });
        });
    });
</script>