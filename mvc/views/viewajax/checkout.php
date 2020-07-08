<?php
$data = [];
if (isset($_SESSION['client'])) $data = $_SESSION['client'];
$_SESSION['total'] = 0;
$totalvnd = '';
$_SESSION['sosp'] = count($data);
?>
<div id="bodyproduct" class="clmilk mt-5 row justify-content-center bg-light rounded-lg shadow-lg mt-5 p-5 btt">
    <div class="row card w-100 mb-5">
        <div class="clblack card-header d-flex justify-content-center">
            <h4 class="font-weight-bold">Thanh toán đặt hàng</h4>
        </div>
    </div>
    <div class="row w-100">
        <div class="col-5 shadow-lg clblack p-2 rounded-lg" style="height: 350px;">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="justify-content-center">Sản phẩm</th>
                        <th scope="col">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data as $key => $val) {
                        $thanhtien = $data[$key]['num'] * $data[$key]['price'];
                        $_SESSION['total'] += $thanhtien;
                        $thanhtien = (string) Functions::parse($thanhtien);
                        echo "<tr id='delete{$key}'>
                            <td>
                                <div class='d-flex justify-content-start'>
                                    {$data[$key]['name']} x <span class='font-weight-bold'> {$data[$key]['num']}</span>
                                </div>
                            </td>            
                            <td>{$thanhtien}</td>
                        </tr>";
                    }
                    $totalvnd = Functions::parse($_SESSION['total']);
                    ?>
                    <div class="row p-3 justify-content-center">
                        <h5 class="font-weight-bold"><i class="fas fa-dollar-sign"></i> Tổng tiền: <?php echo $totalvnd; ?></h5>
                    </div>
                </tbody>
            </table>
        </div>
        <div id="totalorder" class="col-7 clblack p-5 rounded-lg">
            <div class="row justify-content-center border-bottom pb-3">
                <h4 class="font-weight-bold"><i class="fas fa-file-invoice"></i> Tông tin nhận hàng</h4>
                <form class="row pl-5">
                    <div class="row w-100 p-0">
                        <div class="form-group col-md-6 pr-2 pl-0">
                            <label for="inputname">Tên <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="inputname" placeholder="e.g. Cường">
                        </div>
                        <div class="form-group col-md-6 p-0">
                            <label for="inputho">Họ <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="inputho" placeholder="e.g. Nguyễn Văn">
                        </div>
                    </div>
                    <div class="form-group row w-100 p-0">
                        <label for="inputaddress">Địa chỉ <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="inputaddress" placeholder="">
                    </div>
                    <div class="form-group row w-100 p-0">
                        <label for="inputphone">Số điện thoại <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="inputphone">
                    </div>

                </form>
            </div>
            <div class="row justify-content-center pl-3">
                <button id="submitcheckout" class="row w-100 rounded-pill d-flex justify-content-center btn btnrounded p-2">Tiến hành đặt hàng</button>
            </div>
        </div>
    </div>
    <script id="alert">
    </script>
</div>
<script>
    var check = 0;
    var val = 0;

    function deletecart(id) {
        let idTd = '#delete' + id;
        let total = <?php echo $_SESSION['total']; ?>;
        let sosp = <?php echo $_SESSION['sosp']; ?>;
        $.post('./ajax/deletecart', {
            id: id,
            tt: total,
            sosp: sosp
        }, function(data) {
            $("#totalorder").html(data)
            $(idTd).fadeOut()
            $.post('./ajax/updatenumcart', function(data) {
                $("#numcart").html(data);
            });
        });
    }
    $(document).ready(function() {
        $("#checkout").click(function() {
            $.post('./ajax/checkout', function(data) {
                $("#listproduct").html(data);
            })
        });
        $("#submitcheckout").click(function() {
            let lastname = $("#inputname").val();
            let firstname = $("#inputho").val();
            let address = $("#inputaddress").val();
            let phone = $("#inputphone").val();
            let name = firstname + ' ' + lastname;
            if (lastname == '' || firstname == '' || address == '' || phone == '') alert('Vui lòng nhập đầy đủ các trường');
            else {
                $.post('./ajax/order', {
                    n: name,
                    dc: address,
                    phone: phone
                }, function(data) {
                    $.post('./ajax/updatenumcart0', function(data) {
                        $("#numcart").html(data);
                    });
                    $("#listproduct").html(data);
                });
            }
        });
    });
</script>