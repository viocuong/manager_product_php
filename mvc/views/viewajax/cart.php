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
            <h4 class="font-weight-bold">Giỏ hàng <?php if (empty($data)) echo 'của bạn trống'; ?></h4>
        </div>
    </div>
    <div class="row w-100">
        <div class="col-8">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">&nbsp;</th>
                        <th scope="col">&nbsp;</th>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng</th>
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
                            <td scope='row'><a onclick='deleteorder({$key})' class='btn'><i style='color: red;font-size: 26px;' class='far fa-times-circle'></i></a></td>
                            <td class='row'>    <img src='{$data[$key]['img']}' width='120px' height='180px'></td>
                            <td>
                                <div class='d-flex justify-content-center'>
                                    {$data[$key]['name']}
                                </div>
                            </td>
                            <td>{$data[$key]['price']}</td>
                            <td>{$data[$key]['num']}</td>
                            <td>{$thanhtien}</td>
                        </tr>";
                    }
                    $totalvnd = Functions::parse($_SESSION['total']);
                    ?>
                </tbody>
            </table>
        </div>
        <div id="totalorder" class="col-4 shadow-lg clblack p-4 rounded-lg" style="height: 300px;">
            <div class="row d-flex justify-content-center border-bottom pb-3">
                <h4 class="font-weight-bold">Tổng đơn hàng</h4>
            </div>
            <div class="row p-3 border-bottom justify-content-center">
                <h5>
                    sản phẩm: <?php echo $_SESSION['sosp']; ?>
                </h5>
            </div>
            <div class="row p-3 justify-content-center">
                <h5>Tổng tiền: <?php echo $totalvnd; ?></h5>
            </div>
            <button id="checkout" class="w-100 rounded-pill d-flex justify-content-center btn btnrounded p-2">Tiến hành thanh toán</button>
        </div>
    </div>
    <script id="alert">
    </script>
</div>
<script>
    var check = 0;
    var val = 0;
    $(document).ready(function() {
        $("#checkout").click(function() {
            $.post('./ajax/checkout', function(data) {
                $("#listproduct").html(data);
            });
        });
    });
    function deleteorder(id) {
        let idTd = '#delete' + id;
        let total = <?php echo $_SESSION['total']; ?>;
        let sosp = <?php echo $_SESSION['sosp']; ?>;
        $.post('./ajax/deleteorder', {
            id: id,
            tt: total,
            sosp: sosp
        }, function(data) {
            $("#totalorder").html(data);
            $(idTd).fadeOut();
            $.post('./ajax/updatenumcart', function(data) {
                $("#numcart").html(data);
            });
        });
    }
    
</script>