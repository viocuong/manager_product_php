<div id="bodyproduct" class="clmilk mt-5 row justify-content-center bg-light rounded-lg shadow-lg mt-5 p-5 rtl">
    <div class="row card w-100 mb-5">
        <div class="clblack card-header d-flex justify-content-center">
            <h4 class="font-weight-bold"><?php echo $arr['title'] ?></h4>
        </div>
    </div>

    <?php
    $data = $arr['data'];
    foreach ($data as $key => $value) {
        echo "
            <a onclick='detailProduct({$data[$key]['idProduct']})' class='buttonproduct btn m-2 img-post col-3 p-4 bgproduct rounded-lg'>
                <div class='row shadow-lg d-flex justify-content-center'>
                    <img class='rounded-lg' src='./public/image/{$data[$key]['image']}' alt='' height='280' width='230'>
                </div>
                <div class='row d-flex justify-content-center'>
                    <div class='col-12 justify-content-center'>
                        <div class='row mt-3 justify-content-center'>
                            <h5 id='nameproduct9'><i class='fas fa-tag mr-2'></i> {$data[$key]['nameProduct']}</h5>
                        </div>
                        <div class='row mt-3 justify-content-center'>
                            <h5><i class='fas fa-money-bill-wave mr-2'></i> {$data[$key]['price']}</h5>
                        </div>
                    </div>
                </div>
            </a>";
    }

    ?>

</div>
<script>
    function detailProduct(idProduct) {
        $(document).ready(function() {

            $.post("./ajax/detaiProduct", {
                id: idProduct
            }, function(data) {
                $("#listproduct").html(data);
            });
        });
    }
</script>