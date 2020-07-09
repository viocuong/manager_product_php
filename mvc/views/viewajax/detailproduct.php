<?php
$data = $arr['data'][0];
$rate = (float) $data['avgrate'];
$numrate = $data['numrate'];
$star = round($rate * 2) / 2;
?>
<script src="./rateit/scripts/jquery.rateit.js"></script>
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
            <div class="row w-100 p-4 border-bottom">
                <div id="rate" data-rateit-value='<?php echo $star; ?>' data-rateit-mode="font" style="font-size: 40px;" data-rateit-ispreset="true" data-rateit-readonly="true" class="rateit">
                </div>
                <div style="color: red;" style="font-size: 24px;" class="pl-4 row w-100">
                    <?php echo $numrate; ?> lượt đánh giá
                </div>
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
                <div class="col-4 p-2 justify-content-center">
                    <button id="btneditproduct" class="btn btn-success w-50" data-toggle='modal' data-target='#ModalEdit'>Sửa</button>
                    <div class='modal fade' id='ModalEdit' role='dialog'>
                        <div class='modal-dialog'>

                            <!-- Modal content-->
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h4 class='modal-title'>Chỉnh sửa sản phẩm</h4>
                                    <button type='button' class='close' data-dismiss='modal'>&times;</button>

                                </div>
                                <div class='modal-body'>
                                    <form id="formeditproduct" class="w-100">
                                        <div class="form-group pt-3 pb-3">
                                            <label for="inpUser" class="clblack">Tên sản phẩm</label>
                                            <input value="<?php echo $data['nameProduct']; ?>" id="nameproduct" type="text" class="form-control" name="user">
                                        </div>
                                        <div class="row">
                                            <div class="form-group pt-3 pb-3 col-7">
                                                <label for="inpPass" class="clblack">Giá</label>
                                                <input value="<?php echo $data['price']; ?>"" id="priceproduct" type="number" min="0" max="10000000" step="1" class="form-control" name="pass">
                                            </div>
                                            <div class="from-group pt-3 pb-3 col-5">
                                                <labelfor"spiner" class="clblack">Số lượng</label>
                                                    <input value="<?php echo $data['num']; ?>" type="number" name="numberproduct" id="numberproduct" class="form-control" value="0" min="0" max="1000" step="1">
                                                    <p id="error" style="color:red;"></p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class='modal-footer'>
                                    <button id="submiteditproduct" class='btn btn-success'>Đồng ý</button>
                                    <button type='button' class='btn btn-danger' data-dismiss='modal'>Hủy</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-4 p-2 justify-content-center">
                    <button id="btndeleteproduct" class="btn btn-danger w-50">Xóa</button>
                </div>
                <div class="col-4 d-flex p-2 justify-content-center">
                    <button class="btn btn-outline-info w-100" data-toggle='modal' data-target='#ModalExport'>Xuất sản phẩm</button>
                    <div class='modal fade' id='ModalExport' role='dialog'>
                        <div class='modal-dialog'>

                            <!-- Modal content-->
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h4 class='modal-title'>Tài khoản <span style="color:red;"><?php echo $_SESSION['user'] . ' '; ?></span>xuất sản phẩm <span style="color:red;"><?php echo $data['nameProduct']; ?></span></h4>
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
                                    <button id="submitexproduct" class='btn btn-success'>Xuất sản phẩm</button>
                                    <button type='button' class='btn btn-danger' data-dismiss='modal'>Hủy</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script id="alert">

    </script>
</div>
<script>
    var check = 0;
    var val = 0;
    $(document).ready(function() {
        $("#numexport").on('keyup change', function() {
            var max = <?php echo $data['num']; ?>;
            var value = $(this).val();
            if (value > max) {

                $("#error2").html("số lượng không được vượt quá " + max);
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
        $("#btndeleteproduct").click(function() {
            var lever = <?php echo $_SESSION['lever']; ?>;
            var idprd = <?php echo $data['idProduct'] ?>;
            if (lever == 2) {
                alert('Không có quyền xóa');
            } else {
                $.post("./ajax/deleteproduct", {
                    prd: idprd
                }, function(data) {
                    $("#listproduct").html(data);
                });
            }
        });
        $("#submiteditproduct").click(function() {
            //var filename=$(".custom-file-input").val().split("\\").pop();
            //var loai=$("#cagetories1").val()[0];

            var nameprd = $("#nameproduct").val();
            var price = $("#priceproduct").val();
            var soluong = $("#numberproduct").val();
            var idproduct = <?php echo $data['idProduct']; ?>;
            $.post("./ajax/proceedEditProduct", {
                    idpro: idproduct,
                    np: nameprd,
                    pr: price,
                    ql: soluong
                },
                function(data) {
                    $("#listproduct").html(data);
                });
        });
        $("#submitexproduct").click(function() {
            if (val > 0 && check == 1) alert('Vui lòng nhập đúng số lượng');
            else {
                alert("OK");
            }
        });

    });
</script>