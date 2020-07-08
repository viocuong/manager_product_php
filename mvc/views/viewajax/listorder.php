<?php
$data = $arr['data'];
?>
<div id="bodyproduct" class="clmilk mt-5 row justify-content-center bg-light rounded-lg shadow-lg mt-5 p-5 btt">
    <div class="row card w-100 mb-5">
        <div class="clblack card-header d-flex justify-content-center">
            <h4 class="font-weight-bold">Tất cả đơn hàng</h4>
        </div>
    </div>
    <div class="row w-100 overflow-auto">
        <table class="table table-hover" ">
            <thead class=" clblue">
            <tr style="border-bottom:6px solid #0061f2;">
                <th scope="col">&nbsp;</th>
                <th scope="col">Id đơn</th>
                <th scope="col">Tên</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Phone</th>
                <th scope="col">Ngày đặt</th>
                <th scope="col">Sản phẩm</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Thành tiền</th>
            </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $key => $value) {
                    $res = $data[$key];
                    $pay = $res['statusPay'];
                    $ship = $res['statusShip'];
                    $clpay = "clred";
                    if ($pay == 1) $clpay = "clsuccess";
                    $clship = "clred";
                    if ($ship == 1) $clship = "clsuccess";
                    $total = Functions::parse($res['price'] * $res['quantity']);
                    echo "<tr id='{$res['id_order']}'> 
                            <td  class='d-flex'>
                                <button onclick='deleteorder({$res['id_order']})' class='btn clred p-2'><i style='font-size:24px;' class='far fa-trash-alt'></i></button>
                                <button id='send{$res['id_order']}' onclick='sendorder({$res['id_order']})' class='btn {$clship} p-2'><i style='font-size:24px;' class='fas fa-shipping-fast'></i></button>
                                <button id='ship{$res['id_order']}' onclick='payorder({$res['id_order']})' class='btn {$clpay} p-2'><i style='font-size:24px;' class='far fa-credit-card'></i></button>
                            </td>
                            <td>{$res['id_order']}</td>
                            <td>{$res['nameClient']}</td>
                            <td>{$res['addressClient']}</td>
                            <td>{$res['phoneClient']}</td>
                            <td>{$res['date']}</td>
                            <td>{$res['nameProduct']}</td>
                            <td>{$res['quantity']}</td>
                            <td>{$total}</td>
                        </tr>
                        ";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    function deleteorder(id) {
        $.post('./ajax/deleteorder', {
            id: id
        }, function(data) {
            let str = '#' + id;
            $(str).fadeOut();
        });
    }

    function sendorder(id) {
        $.post("./ajax/sendorder", {
            id: id
        }, function() {
            $("#send" + id).removeClass("clred");
            $("#send" + id).addClass("clsuccess");
            $.post("./ajax/getyetsend", function(data) {
                $("#yetsend").html(data);
            });
        });
    }

    function payorder(id) {
        $.post("./ajax/payorder", {
            id: id
        }, function() {
            $("#ship" + id).removeClass("clred");
            $("#ship" + id).addClass("clsuccess");
            $.post("./ajax/getyetpay", function(data) {
                $("#yetpay").html(data);
            });
        });
    }
</script>