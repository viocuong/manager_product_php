<div id="bodyproduct" class="clmilk mt-5 row justify-content-around bg-light rounded-lg shadow-lg mt-5 p-5 btt">
    <div class="row card w-100 mb-5">
        <div class="clblack card-header d-flex justify-content-center">
            <h4 class="font-weight-bold">Thêm sản phẩm</h4>
        </div>
    </div>
    <div class="row w-100 justify-content-center">
        <div class="col-5 w-100 justify-content-center">
            <img id="img" src="" alt="" width="320" height="400">
        </div>
        <div class="col-7 w-100">
            <form id="formaddproduct" action='./product/addproduct' method="POST" class="w-100">
                <label class="clblack" for="sel1">Loại sản phẩm</label>
                <select class="form-control" id="cagetories1">
                    <?php
                    $data = $arr['cagetories'];
                    foreach ($data as $key) {
                        echo "<option>".$key['idCagetories']." ". $key['name'] . "( " . $key['sesion'] . " )";
                    }
                    ?>
                </select>
                <div class="form-group pt-3 pb-3">
                    <label for="inpUser" class="clblack">Tên sản phẩm</label>
                    <input id="nameproduct" type="text" class="form-control" name="user">
                </div>
                <div class="row">
                    <div class="form-group pt-3 pb-3 col-7">
                        <label for="inpPass" class="clblack">Giá</label>
                        <input id="priceproduct" type="number" min="0" max="10000000" step="1" class="form-control" name="pass">
                    </div>
                    <div class="from-group pt-3 pb-3 col-5">
                        <label for"spiner" class="clblack">Số lượng</label>
                        <input type="number" name="numberproduct" id="numberproduct" class="form-control" value="0" min="0" max="1000" step="1">
                    </div>
                </div>
            </form>
            <form action="">
                <p>Ảnh sản phẩm</p>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="upimgproduct" name="fileimg">
                    <label class="custom-file-label" for="customFile">Chọn ảnh</label>
                </div>
                <a id="uploadimg" class="btn btn-dark">upload</a>
                /div>
            </form>
            <div class="w-100" id="addproductsuccess">
                
            </div>
            <button id="submitaddproduct" class="btn buttonlogin w-100 pt-2 pb-2 mb-3 mt-3">Thêm vào</button>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        $("#uploadimg").click(function() {
            var fd = new FormData();
            var files = $("#upimgproduct")[0].files[0];
            fd.append('file', files);
            $.ajax({
                url: './ajax/upload',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response != 0) {
                        $("#img").attr("src", response);
                        $(".preview img").show();
                    } else {
                        alert('file not uploaded');
                    }
                },
            });
        });
        $("#submitaddproduct").click(function(){
            var filename=$(".custom-file-input").val().split("\\").pop();
            var loai=$("#cagetories1").val()[0];
            var nameprd=$("#nameproduct").val();
            var price=$("#priceproduct").val();
            var soluong=$("#numberproduct").val();
            $.post("./ajax/proceedAddProduct",
            {
                fn:filename,
                ct:loai,
                np:nameprd,
                pr:price,
                ql:soluong
            },
            function(data){
                $("#addproductsuccess").html(data);
            });
        });

    });
</script>