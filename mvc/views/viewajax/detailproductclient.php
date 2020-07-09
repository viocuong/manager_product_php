<?php
$data = $arr['data'][0];
$rate = (float) $data['avgrate'];
$numrate=$data['numrate'];
$star = round($rate * 2) / 2;
?>
<div id="bodyproduct" class="clmilk mt-5 row justify-content-center bg-light rounded-lg shadow-lg mt-5 p-5 btt">
    <div class="row card w-100 mb-5">
        <div class="clblack card-header d-flex justify-content-center">
            <h4 class="font-weight-bold"><?php echo $arr['title'] ?></h4>
        </div>
    </div>

    <div class="row w-100">
        <div class="col-5 d-flex justify-content-end">
            <img class='rounded-lg' src='./public/image/<?php echo $arr['data'][0]['image'];  ?>' alt='' height='450' width='320'>
        </div>
        <div class="pl-5 col-7 clblack">
            <div class="w-100 row p-4 border-bottom">
                <h5 class="font-weight-bolder"><i style="font-size: 24px;" class="mr-2 fas fa-star"></i><?php echo $data['nameProduct'] ?><span style="font-size: 13px;" class="pl-3"><?php echo "( Mã sp cnv{$data['idProduct']} )"; ?></span></h5>
            </div>
            <div class="w-100 row p-4 border-bottom">
                <h5 style="color:red;">
                    <i style="font-size: 24px;" class="mr-2 fas fa-money-bill-wave"></i>
                    <?php
                    setlocale(LC_MONETARY, "vi");
                    echo Functions::parse($data['price']); ?>
                </h5>
            </div>
            <div class="w-100 row p-4 border-bottom">
                <h5 class="font-weight-bolder"><i class="mr-2 far fa-calendar-alt"></i>Ngày nhập: <?php echo $data['dateIn']; ?> </h5>
            </div>
            <div class="w-100 row p-4 border-bottom">
                <h5 class="font-weight-bolder"><i style="font-size: 24px;" class="mr-2 fas fa-sort-numeric-up-alt"></i><?php echo "Số lượng còn lại: " . $data['num'] ?></h5>
            </div>
            <div class="w-100 row p-4">
                <div class="col-6 d-flex p-3 justify-content-center">
                    <button class="btn btn-outline-info w-100 p-2" data-toggle='modal' data-target='#ModalExport'></span><i class="mr-2 fas fa-cart-plus"></i>Thêm vào giỏ hàng</button>
                    <div class='modal fade' id='ModalExport' role='dialog'>
                        <div class='modal-dialog'>

                            <!-- Modal content-->
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h4 class='modal-title'>Thêm vào giỏ hàng <span style="color:red;"><?php echo $data['nameProduct']; ?></span></h4>
                                    <button type='button' class='close' data-dismiss='modal'>&times;</button>

                                </div>
                                <div class='modal-body'>
                                    <form id="formeditproduct" class="w-100">
                                        <div class="row">
                                            <div class="from-group pt-3 pb-3 col-12">
                                                <labelfor"spiner" class="clblack">Số lượng</label>
                                                    <input id="numexport" type="number" name="numberproduct" class="form-control" value="0" min="0" max="1000" step="1">
                                                    <p style="color:red;" id="error2"></p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class='modal-footer'>
                                    <button id="submitaddcart" class='btn btn-success'>Thêm</button>
                                    <button type='button' class='btn btn-danger' data-dismiss='modal'>Hủy</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="./rateit/scripts/jquery.rateit.js"></script>
    <div class="row">
        <div class="pt-5" style="color:#e7305b;font-size: 28px;">
            <p>Đánh giá sản phẩm</p>
        </div>
    </div>
    <div class="row w-100 justify-content-center clblack pb-3">
        <div class="row w-100 justify-content-center">
            <div class="text-danger">Có <?php echo $numrate; ?> đánh giá cho sản phẩm này</div>
        </div>
        <div class=" row">
            Rất mong nhận được đánh giá của bạn
        </div>
    </div>
    <div class="row w-100 justify-content-center">
        <div id="rate" data-rateit-value='<?php echo $star; ?>' data-rateit-mode="font" style="font-size: 40px;" class="rateit">
        </div>
    </div>
    <div id="submitrate" class="w-100 d-flex justify-content-center p-2">
        <button class="btn btnpink px-5 rounded-pill">Đánh giá</button>
    </div>
    <div class="clblack" id="alert">
    </div>
</div>
<script>
    var check = 0;
    var val = 0;
    $(document).ready(function() {
        $("#numexport").on('keyup change', function() {
            var max = <?php echo $data['num']; ?>;
            var value = $(this).val();
            if (value > max && value > 0) {

                $("#error2").html("số lượng lớn hơn 0 và không được vượt quá " + max);
                $(this).addClass("border-danger");
                val = value;
                check = 1;
            } else {
                $("#error2").html("");
                $(this).removeClass("border-danger");
                val = value;
                check = 0;
            }
        });
        $("#submitaddcart").click(function() {
            //var filename=$(".custom-file-input").val().split("\\").pop();
            //var loai=$("#cagetories1").val()[0];

            if (check == 0 && val) {
                var nameprd = '<?php echo $data['nameProduct'];  ?>';
                var price = <?php echo $data['price'];  ?>;
                var soluong = $("#numexport").val();
                var idproduct = <?php echo $data['idProduct'];  ?>;
                var numcart = <?php echo $_SESSION['numcart']; ?>;
                var image = '<?php echo $data['image'] ?>';

                $.post("./ajax/proceedaddcart", {
                        idpro: idproduct,
                        np: nameprd,
                        pr: price,
                        ql: soluong,
                        img: image
                    },
                    function(data) {
                        $("#listproduct").html(data);
                        $.post('./ajax/updatenumcart', function(data) {
                            $("#numcart").html(data);
                        });
                    });
            } else alert('Vui lòng nhập giá trị hợp lệ');
        });
        $("#submitexproduct").click(function() {
            if (val > 0 && check == 1) alert('Vui lòng nhập đúng số lượng');
            else {
                alert("OK");
            }
        });
        $("#submitrate").click(function() {
            let star = $('#rate').rateit('value');
            let idproduct = <?php echo $data['idProduct']; ?>;
            $.post('./ajax/rate', {
                star: star,
                id: idproduct
            }, function() {
                alert('Cảm ơn bạn đã đánh giá ' + star + '* cho sản phẩm này, chúng tôi ghi nhận đánh giá này để cải thiện sản phẩm');
            });

        });
    });
</script>