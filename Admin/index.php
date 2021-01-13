<?php
session_start();
if (isset($_SESSION['tendnadmin'])) {
    
} else {
    header("location:login_admin.php");
}
if (isset($_GET['nc']) && $_GET['nc'] == 'thoat') {
    session_destroy();
    header("location:login_admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Quản trị hệ thống</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../images/logo.ico">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link href="css/dataTables.bootstrap.min.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />
        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.min.js"></script>
    </head>
    <style>

    </style>

    <body>

        <nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top fixed-top">
            <a class="navbar-brand p-0" href="index.php">
                <img style="margin: -13px 3px -8px -1px;
                     width: 50px;
                     border-radius: 50%;" src="https://static.wixstatic.com/media/48fd8b_d958459cd7e249878304ab579bc59f73~mv2.png/v1/fill/w_600%2Ch_600%2Cal_c%2Cq_90/file.jpg" width="100"><span class="logo_name">TVD Technology</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="dropdown show" style="margin-left: 40px">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sản phẩm</a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="index.php?nc=nhapsp">Quản lí sản phẩm</a>
                    <a class="dropdown-item" href="index.php?nc=hsx">Quản lý hãng sản xuất</a>
                </div>
            </div>
            <div class="dropdown show" style="margin-left: 27px;">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Tin Tức</a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="index.php?nc=tintuc">Quản lí tin tức</a>
                </div>
            </div>
            <div class="dropdown show" style="margin-left: 27px;">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Thống kê</a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="index.php?nc=hangton">Thống kê hàng tồn kho</a>
                </div>
            </div>
            <div class="dropdown show" style="margin-left: 27px;">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Đơn Hàng</a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="index.php?nc=thongke">Quản lí đơn hàng</a>
                </div>
            </div>
            <div class="dropdown show" style="margin-left: 27px;">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Tài khoản</a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="index.php?nc=taikhoan">Quản lí tài khoản người dùng</a>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <?php if (isset($_SESSION['tendnadmin']) && $_SESSION['tendnadmin']) { ?>
                        <li class='nav-item'><a class="nav-link text-white">Hello: <?php echo $_SESSION['tendnadmin']; ?></a></li>
                    <?php } else { ?>
                        <li class="nav-item"><a class="nav-link text-white" data-toggle="modal" data-target="#login" href="#">Đăng nhập</a></li>
                        <?php
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="?nc=thoat"><i class='fas fa-share-square mr-1'></i>Thoát</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="col-md-9 pr-5">
            <?php
            if (isset($_SESSION['tendnadmin'])) {
                if (isset($_GET['nc'])) {
                    if ($_GET['nc'] == 'hsx') {
                        require('chuc_nang/quanli_hangsx/dshsx.php');
                    }
                    if ($_GET['nc'] == 'themhsx') {
                        require('chuc_nang/quanli_hangsx/fr_NhapHangSX.php');
                    }
                    if ($_GET['nc'] == 'suahsx') {
                        require('chuc_nang/quanli_hangsx/fr_SuaHSX.php');
                    }
                    if ($_GET['nc'] == 'nhapsp') {
                        require('chuc_nang/quanli_sp/dssp.php');
                    }
                    if ($_GET['nc'] == 'themsp') {
                        require('chuc_nang/quanli_sp/fr_NhapSanPham.php');
                    }
                    if ($_GET['nc'] == 'suasp') {
                        require('chuc_nang/quanli_sp/fr_SuaSanPham.php');
                    }
                    if ($_GET['nc'] == 'tintuc') {
                        require('chuc_nang/quanli_tintuc/dstintuc.php');
                    }
                    if ($_GET['nc'] == 'themtt') {
                        require('chuc_nang/quanli_tintuc/fr_TinTuc.php');
                    }
                    if ($_GET['nc'] == 'view_suatt') {
                        require('chuc_nang/quanli_tintuc/fr_SuaTinTuc.php');
                    }
                    if ($_GET['nc'] == 'chitietdh') {
                        require('chuc_nang/quanli_donhang/fr_ChiTietDH.php');
                    }
                    if ($_GET['nc'] === 'xoahoadon') {
                        require('chuc_nang/quanli_donhang/xoa_hoa_don');
                    }
                    if ($_GET['nc'] == 'taikhoan') {
                        require('chuc_nang/quanli_taikhoan_user/dstaikhoan.php');
                    }
                    if ($_GET['nc'] == 'thongke') {
                        require('chuc_nang/quanli_donhang/fr_ThongKeDH.php');
                    }
                    if ($_GET['nc'] == 'xacnhan') {
                        require('chuc_nang/quanli_donhang/xulyxacnhan.php');
                    }
                    if ($_GET['nc'] == 'hangton') {
                        require('chuc_nang/quanli_hangton/fr_HangTon.php');
                    }
                    if (isset($_GET['nc']) && $_GET['nc'] == 'thoat') {
                        session_destroy();
                        header("location:login_admin.php");
                    }
                } else {
                    include('home.php');
                }
            } else {
                header("location:login_admin.php");
            }
            ?>

        </div>
    </div>
    <div class="container-fluid p-0 mt-3 footer-admin">
        <div class="col-12 text-center text-white bg-dark py-3">
            <h5>&copy; Website Bán Linh Kiện Máy Tính</h5>
        </div>
    </div>
</body>


</html>