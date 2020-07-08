<!DOCTYPE html>
<html lang="vi">

<head>
    <?php
    include('./includes/header.php');
    ?>
</head>

<body class="Login pb-5 mb-5" style="background: linear-gradient(#e66465, #9198e5);background-repeat: no-repeat;">
    <!---Header------------------------------------------------------------------------------------------------------->
    <header class="d-flex bg-gradient flex-sm-row justify-content-center p-2">

        <div class="align-self-center p-2">
            <div id="menu" class="d-flex justify-content-end">
                <a href="#" class="d-sm-none d-flex " style="text-decoration:none;">
                    <i class="material-icons" style="color: white;vertical-align: middle;font-size: 36px;">menu</i>
                </a>
            </div>
            <!-----------------MENU PHONE-------------------------------------------------------------------->
            <div id="menu1" style="display: none;">hello</div>
            <div class="d-flex">
                <nav id="menu2" class=" align-self-end navbar-nav-scroll navbar-expand-sm navbar-light justify-content-end p-0 d-none d-sm-flex">
                    <ul class="navbar-nav flex-column flex-sm-row d-flex" style="font-family: 'Roboto', sans-serif; ">
                        <li class="nav-item pr-3 d-flex">
                            <a id="menubar" href="./" class="pl-0 mn nav-link font-menu1 cool-link ltr" style="color:#ffffff;"><i class="d-none d-sm-block material-icons" style="color: #ffffff;vertical-align: middle;">house</i></a>
                        </li>
                        <li class="nav-item pr-3">
                            <a id="manager" class="btn mn nav-link font-menu1 cool-link ltr" style="color:#ffffff;"><i class="material-icons" style="color: #ffffff;vertical-align: middle;">fingerprint</i> Quản lý</a>
                        </li>
                        <li class="nav-item pr-3 ltr">
                            <a href="./account" id="menubar" class="mn nav-link font-menu1 cool-link" style="color:#ffffff">
                                <i class="fas fa-user"></i><?php
                                                            $user = 'Account';
                                                            if (!empty($_SESSION['user'])) {
                                                                $user = $_SESSION['user'];
                                                            }
                                                            echo $user;
                                                            ?></a>
                        </li>
                    </ul>
                    <script>
                        var mn = document.getElementsByClassName("mn");
                        var size = mn.length;
                        var s = 0.8;
                        for (var i = size - 1; i >= 0; i--) {
                            mn[i].style.animationDuration = "" + s + "s";
                            s += 0.2;
                        }
                    </script>
                </nav>
            </div>
    </header>
    <div id="mainhome" class="container">
        <?php if (isset($arr['page'])) include('./mvc/views/pages/' . $arr['page'] . '.php'); ?>

    </div>

    <!--<footer class="container-fluid bg-gradient w-100">
        <div class="row d-flex justify-content-center flex-column">
            
                <div>&copy Nguyễn Văn Cường</div>
                <div>Phone: 0989839428</div>
        
        </div>
    </footer>
    -->
    <script>
        var count = 1;
        $(document).ready(function() {
            $("#manager").click(function() {
                var user = '<?php if (isset($_SESSION['user'])) echo $_SESSION['user']; else echo ''; ?>';
                if (user == ''){
                    let cf=confirm('không có quyền truy cập, vui lòng đăng nhập');
                    if(cf) location.assign('./login');
                }
                else {
                    $.post('./ajax/product', function(data) {
                        $("#mainhome").html(data);
                    });
                }
            });
            $("#menu").click(function() {
                var list = document.getElementById("menubar");
                var idx, leng = list.length;
                for (idx = 0; idx < leng; idx++) {
                    list[idx].classList.remove("ltr");
                }
                var menu = $("#menu2");
                if (count % 2) {
                    menu.addClass("d-flex");
                    menu.slideDown("slow");
                } else {
                    menu.removeClass("d-flex");
                }
                count++;
            });
        });
    </script>
</body>

</html>